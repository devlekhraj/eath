<?php

namespace Tests\Feature;

use Database\Seeders\WebsiteDemoSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Carbon;
use Tests\TestCase;

class WebsiteCompareTreksTest extends TestCase
{
    use RefreshDatabase;

    public function test_compare_page_renders_database_stored_items_for_visitor(): void
    {
        $this->seed(WebsiteDemoSeeder::class);
        $visitorKey = str_repeat('a', 40);

        $this->withSession(['eath_compare_visitor' => $visitorKey])->postJson('/compare-treks/items', [
            'trek_id' => 't-ebc',
        ])->assertOk()
            ->assertJsonPath('count', 1)
            ->assertJsonPath('ids.0', 'everest-base-camp');

        $this->withSession(['eath_compare_visitor' => $visitorKey])->postJson('/compare-treks/items', [
            'trek_id' => 't-abc',
        ])->assertOk()
            ->assertJsonPath('count', 2)
            ->assertJsonPath('ids.1', 'annapurna-base-camp');

        $response = $this->withSession(['eath_compare_visitor' => $visitorKey])->get('/compare-treks');

        $response->assertOk()
            ->assertSee('Everest Base Camp')
            ->assertSee('Annapurna Base Camp')
            ->assertSee('Journey Specifications');
    }

    public function test_compare_items_can_be_removed_and_cleared_from_database(): void
    {
        $this->seed(WebsiteDemoSeeder::class);
        $visitorKey = str_repeat('b', 40);

        $this->withSession(['eath_compare_visitor' => $visitorKey])->postJson('/compare-treks/items', ['trek_id' => 't-ebc'])->assertOk();
        $this->withSession(['eath_compare_visitor' => $visitorKey])->postJson('/compare-treks/items', ['trek_id' => 't-abc'])->assertOk();

        $this->withSession(['eath_compare_visitor' => $visitorKey])->deleteJson('/compare-treks/items/t-ebc')
            ->assertOk()
            ->assertJsonPath('count', 1)
            ->assertJsonMissingPath('ids.1');

        $this->withSession(['eath_compare_visitor' => $visitorKey])->deleteJson('/compare-treks/items')
            ->assertOk()
            ->assertJsonPath('count', 0);
    }

    public function test_compare_add_appends_up_to_three_items_for_same_visitor(): void
    {
        $this->seed(WebsiteDemoSeeder::class);
        $visitorKey = str_repeat('c', 40);

        $this->withSession(['eath_compare_visitor' => $visitorKey])->postJson('/compare-treks/items', ['trek_id' => 't-ebc'])
            ->assertOk()
            ->assertJsonPath('count', 1);

        $this->withSession(['eath_compare_visitor' => $visitorKey])->postJson('/compare-treks/items', ['trek_id' => 't-abc'])
            ->assertOk()
            ->assertJsonPath('count', 2);

        $this->withSession(['eath_compare_visitor' => $visitorKey])->postJson('/compare-treks/items', ['trek_id' => 't-langtang'])
            ->assertOk()
            ->assertJsonPath('count', 3)
            ->assertJsonPath('ids.0', 'everest-base-camp')
            ->assertJsonPath('ids.1', 'annapurna-base-camp')
            ->assertJsonPath('ids.2', 'langtang-valley');
    }

    public function test_compare_add_appends_with_normal_session_identity(): void
    {
        $this->seed(WebsiteDemoSeeder::class);
        $visitorKey = str_repeat('d', 40);

        $this->withHeader('X-Compare-Visitor', $visitorKey)->postJson('/compare-treks/items', ['trek_id' => 't-ebc'])
            ->assertOk()
            ->assertJsonPath('count', 1);

        $this->withHeader('X-Compare-Visitor', $visitorKey)->postJson('/compare-treks/items', ['trek_id' => 't-abc'])
            ->assertOk()
            ->assertJsonPath('count', 2);

        $this->withHeader('X-Compare-Visitor', $visitorKey)->postJson('/compare-treks/items', ['trek_id' => 't-langtang'])
            ->assertOk()
            ->assertJsonPath('count', 3);
    }

    public function test_compare_items_store_request_metadata(): void
    {
        $this->seed(WebsiteDemoSeeder::class);
        $visitorKey = str_repeat('e', 40);
        Carbon::setTestNow('2026-09-13 03:45:00');

        $this
            ->withServerVariables(['REMOTE_ADDR' => '203.0.113.10'])
            ->withHeaders([
                'X-Compare-Visitor' => $visitorKey,
                'User-Agent' => 'EATH Compare Test Browser',
                'Referer' => 'https://eath.test/treks',
                'Accept-Language' => 'en-US,en;q=0.9',
            ])
            ->postJson('/compare-treks/items', [
                'trek_id' => 't-ebc',
                'request_timezone' => 'Asia/Kathmandu',
                'latitude' => 27.7172453,
                'longitude' => 85.3239605,
            ])
            ->assertOk()
            ->assertJsonPath('count', 1);

        $this->assertDatabaseHas('website_comparison_items', [
            'visitor_key' => $visitorKey,
            'ip_address' => '203.0.113.10',
            'user_agent' => 'EATH Compare Test Browser',
            'referer_url' => 'https://eath.test/treks',
            'accept_language' => 'en-US,en;q=0.9',
            'request_time' => '2026-09-13 03:45:00',
            'request_timezone' => 'Asia/Kathmandu',
            'server_timezone' => config('app.timezone'),
            'latitude' => 27.7172453,
            'longitude' => 85.3239605,
        ]);

        Carbon::setTestNow();
    }
}
