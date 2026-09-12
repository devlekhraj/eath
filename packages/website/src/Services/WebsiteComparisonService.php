<?php

namespace Website\Services;

use Admin\Models\Journey;
use Admin\Models\WebsiteComparisonItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Str;
use Website\Support\WebsiteMoneyFormatter;

class WebsiteComparisonService
{
    protected const COOKIE_NAME = 'eath_compare_visitor';
    protected const MAX_ITEMS = 3;

    public function visitorKey(Request $request): string
    {
        if ($request->attributes->has('website_compare_visitor_key')) {
            return (string) $request->attributes->get('website_compare_visitor_key');
        }

        $key = (string) ($request->header('X-Compare-Visitor') ?: $request->input('visitor_key', ''));

        if (!preg_match('/^[a-f0-9]{40}$/', $key) && $request->hasSession()) {
            $key = (string) $request->session()->get(self::COOKIE_NAME, '');
            if (!preg_match('/^[a-f0-9]{40}$/', $key)) {
                $key = Str::lower(Str::random(40));
                $request->session()->put(self::COOKIE_NAME, $key);
            }
        }

        if (!preg_match('/^[a-f0-9]{40}$/', $key)) {
            $key = (string) $request->cookie(self::COOKIE_NAME, '');
            if (!preg_match('/^[a-f0-9]{40}$/', $key)) {
                $key = Str::lower(Str::random(40));
            }
        }

        Cookie::queue(cookie(self::COOKIE_NAME, $key, 60 * 24 * 365, null, null, false, true, false, 'Lax'));

        $request->attributes->set('website_compare_visitor_key', $key);

        return $key;
    }

    public function selectedIds(Request $request): array
    {
        return $this->queryForVisitor($this->visitorKey($request))
            ->pluck('journeys.slug')
            ->all();
    }

    public function state(Request $request, ?string $message = null, ?string $status = null): array
    {
        $treks = WebsiteCatalogRepository::compareTreks($this->selectedIds($request))['selectedTreks'];
        $items = array_map(fn ($trek) => [
            'id' => $trek['id'],
            'name' => $trek['name'],
            'slug' => $trek['slug'],
            'duration' => "{$trek['duration_days']} Days",
            'difficulty' => $trek['difficulty'],
            'max_altitude_m' => $trek['max_altitude_m'],
            'price' => WebsiteMoneyFormatter::format($trek['price_minor']),
            'url' => route('website.treks.show', $trek['slug']),
        ], $treks);

        return [
            'status' => $status ?? 'ok',
            'message' => $message,
            'max' => self::MAX_ITEMS,
            'count' => count($items),
            'ids' => array_column($items, 'id'),
            'items' => $items,
            'compare_url' => route('website.compare'),
        ];
    }

    public function add(Request $request, string $trekId): array
    {
        $visitorKey = $this->visitorKey($request);
        $journey = $this->findJourney($trekId);

        if (!$journey) {
            return $this->state($request, 'That trek is not available for comparison.', 'error');
        }

        $count = $this->queryForVisitor($visitorKey)->count();
        $existing = $this->queryForVisitor($visitorKey)->where('journeys.id', $journey->id)->exists();
        if (!$existing && $count >= self::MAX_ITEMS) {
            return array_merge($this->state($request, 'Choose a trek to replace.', 'limit'), [
                'incoming' => [
                    'id' => $journey->slug,
                    'name' => $journey->name,
                ],
            ]);
        }

        $item = WebsiteComparisonItem::query()->firstOrNew([
            'visitor_key' => $visitorKey,
            'journey_id' => $journey->id,
        ]);

        $item->fill($this->requestMetadata($request));

        if (!$item->exists) {
            $item->position = $count;
        }

        $item->save();

        return $this->state($request, "{$journey->name} added to comparison.", 'ok');
    }

    public function remove(Request $request, string $trekId): array
    {
        $visitorKey = $this->visitorKey($request);
        $journey = $this->findJourney($trekId);

        if ($journey) {
            WebsiteComparisonItem::query()
                ->forVisitor($visitorKey)
                ->whereBelongsTo($journey)
                ->delete();
            $this->resequence($visitorKey);
        }

        return $this->state($request, 'Comparison updated.', 'ok');
    }

    public function replace(Request $request, string $oldTrekId, string $newTrekId): array
    {
        $visitorKey = $this->visitorKey($request);
        $oldJourney = $this->findJourney($oldTrekId);
        $newJourney = $this->findJourney($newTrekId);

        if (!$newJourney) {
            return $this->state($request, 'That trek is not available for comparison.', 'error');
        }

        $oldItem = $oldJourney
            ? WebsiteComparisonItem::query()->forVisitor($visitorKey)->whereBelongsTo($oldJourney)->first()
            : null;

        WebsiteComparisonItem::query()
            ->forVisitor($visitorKey)
            ->whereBelongsTo($newJourney)
            ->delete();

        if ($oldItem) {
            $oldItem->fill([
                'journey_id' => $newJourney->id,
                ...$this->requestMetadata($request),
            ])->save();
        } else {
            WebsiteComparisonItem::query()->create([
                'visitor_key' => $visitorKey,
                'journey_id' => $newJourney->id,
                'position' => min($this->queryForVisitor($visitorKey)->count(), self::MAX_ITEMS - 1),
                ...$this->requestMetadata($request),
            ]);
        }

        $this->trimToLimit($visitorKey);
        $this->resequence($visitorKey);

        return $this->state($request, "{$newJourney->name} added to comparison.", 'ok');
    }

    public function set(Request $request, array $trekIds): array
    {
        $visitorKey = $this->visitorKey($request);
        WebsiteComparisonItem::query()->forVisitor($visitorKey)->delete();

        $position = 0;
        foreach ($trekIds as $trekId) {
            $journey = $this->findJourney((string) $trekId);
            if (!$journey || $position >= self::MAX_ITEMS) {
                continue;
            }

            WebsiteComparisonItem::query()->firstOrCreate([
                'visitor_key' => $visitorKey,
                'journey_id' => $journey->id,
            ], [
                'position' => $position,
                ...$this->requestMetadata($request),
            ]);
            $position++;
        }

        return $this->state($request, 'Comparison updated.', 'ok');
    }

    public function clear(Request $request): array
    {
        WebsiteComparisonItem::query()
            ->forVisitor($this->visitorKey($request))
            ->delete();

        return $this->state($request, 'Comparison cleared.', 'ok');
    }

    protected function queryForVisitor(string $visitorKey)
    {
        return WebsiteComparisonItem::query()
            ->join('journeys', 'journeys.id', '=', 'website_comparison_items.journey_id')
            ->where('website_comparison_items.visitor_key', $visitorKey)
            ->where('journeys.is_active', true)
            ->where('journeys.is_published', true)
            ->orderBy('website_comparison_items.position')
            ->orderBy('website_comparison_items.created_at')
            ->select('website_comparison_items.*', 'journeys.slug');
    }

    protected function findJourney(string $trekId): ?Journey
    {
        $trek = WebsiteCatalogRepository::findTrek($trekId);

        return !empty($trek['db_id']) ? Journey::query()->find($trek['db_id']) : null;
    }

    protected function requestMetadata(Request $request): array
    {
        return [
            'ip_address' => $request->server('REMOTE_ADDR'),
            'user_agent' => Str::limit((string) $request->userAgent(), 2000, ''),
            'referer_url' => Str::limit((string) $request->headers->get('referer', ''), 2048, ''),
            'accept_language' => Str::limit((string) $request->headers->get('accept-language', ''), 255, ''),
            'request_time' => now(),
            'request_timezone' => Str::limit((string) $request->input('request_timezone', ''), 100, ''),
            'server_timezone' => Str::limit((string) config('app.timezone', date_default_timezone_get()), 100, ''),
            'latitude' => $this->coordinate($request->input('latitude'), -90, 90),
            'longitude' => $this->coordinate($request->input('longitude'), -180, 180),
        ];
    }

    protected function coordinate(mixed $value, int $min, int $max): ?float
    {
        if ($value === null || $value === '' || !is_numeric($value)) {
            return null;
        }

        $coordinate = (float) $value;

        return $coordinate >= $min && $coordinate <= $max ? $coordinate : null;
    }

    protected function trimToLimit(string $visitorKey): void
    {
        $keepIds = $this->queryForVisitor($visitorKey)->limit(self::MAX_ITEMS)->pluck('website_comparison_items.id')->all();

        WebsiteComparisonItem::query()
            ->forVisitor($visitorKey)
            ->when($keepIds !== [], fn ($query) => $query->whereNotIn('id', $keepIds))
            ->delete();
    }

    protected function resequence(string $visitorKey): void
    {
        $ids = $this->queryForVisitor($visitorKey)->pluck('website_comparison_items.id')->all();

        foreach ($ids as $position => $id) {
            WebsiteComparisonItem::query()->whereKey($id)->update([
                'position' => $position,
                'updated_at' => now(),
            ]);
        }
    }
}
