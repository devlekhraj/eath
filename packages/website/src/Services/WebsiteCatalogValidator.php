<?php

namespace Website\Services;

class WebsiteCatalogValidator
{
    /**
     * Run complete validation suite on the catalog and content fixtures.
     * Returns an array of error messages; empty array indicates valid.
     */
    public static function validate(): array
    {
        $errors = [];

        $regions = WebsiteCatalogRepository::getRegions();
        $experiences = WebsiteCatalogRepository::getExperiences();
        $months = WebsiteCatalogRepository::getMonths();
        $treks = WebsiteCatalogRepository::getTreks();
        $departures = WebsiteCatalogRepository::getDepartures();
        $articles = WebsiteCatalogRepository::getArticles();
        $guides = WebsiteCatalogRepository::getGuides();
        $stories = WebsiteCatalogRepository::getStories();

        // 1. Cardinality checks
        if (count($treks) !== 8) {
            $errors[] = "Expected exactly 8 treks, got " . count($treks);
        }
        if (count($regions) !== 5) {
            $errors[] = "Expected exactly 5 regions, got " . count($regions);
        }
        if (count($experiences) !== 6) {
            $errors[] = "Expected exactly 6 experiences, got " . count($experiences);
        }
        if (count($months) !== 12) {
            $errors[] = "Expected exactly 12 months, got " . count($months);
        }
        if (count($departures) !== 24) {
            $errors[] = "Expected exactly 24 departures, got " . count($departures);
        }
        if (count($articles) !== 6) {
            $errors[] = "Expected exactly 6 articles, got " . count($articles);
        }
        if (count($guides) !== 3) {
            $errors[] = "Expected exactly 3 guides, got " . count($guides);
        }
        if (count($stories) !== 3) {
            $errors[] = "Expected exactly 3 stories, got " . count($stories);
        }

        // 2. Trek detail and itinerary checks
        $knownRegionIds = array_column($regions, 'id');
        $knownExpIds = array_column($experiences, 'id');
        $knownGuideIds = array_column($guides, 'id');
        $trekIds = [];
        $trekSlugs = [];

        foreach ($treks as $trek) {
            if (in_array($trek['id'], $trekIds, true)) {
                $errors[] = "Duplicate trek ID: {$trek['id']}";
            }
            $trekIds[] = $trek['id'];

            if (in_array($trek['slug'], $trekSlugs, true)) {
                $errors[] = "Duplicate trek slug: {$trek['slug']}";
            }
            $trekSlugs[] = $trek['slug'];

            // Foreign keys
            if (!in_array($trek['region_id'], $knownRegionIds, true)) {
                $errors[] = "Trek {$trek['id']} has invalid region_id: {$trek['region_id']}";
            }
            foreach ($trek['experience_ids'] as $eId) {
                if (!in_array($eId, $knownExpIds, true)) {
                    $errors[] = "Trek {$trek['id']} has invalid experience_id: {$eId}";
                }
            }
            if (!in_array($trek['guide_id'], $knownGuideIds, true)) {
                $errors[] = "Trek {$trek['id']} has invalid guide_id: {$trek['guide_id']}";
            }

            // Price coherence
            if ($trek['price_minor'] !== $trek['price_usd'] * 100) {
                $errors[] = "Trek {$trek['id']} price_minor ({$trek['price_minor']}) does not equal price_usd * 100 ({$trek['price_usd']})";
            }

            // Itinerary completeness
            $itinerary = $trek['itinerary'] ?? [];
            if (count($itinerary) !== (int)$trek['duration_days']) {
                $errors[] = "Trek {$trek['id']} duration_days is {$trek['duration_days']} but itinerary contains " . count($itinerary) . " days";
            }
            foreach ($itinerary as $idx => $day) {
                $expectedDay = $idx + 1;
                if ((int)$day['day'] !== $expectedDay) {
                    $errors[] = "Trek {$trek['id']} itinerary day number {$day['day']} does not match sequential index {$expectedDay}";
                }
            }

            // Related treks check
            foreach ($trek['related_trek_ids'] ?? [] as $rId) {
                if ($rId === $trek['id']) {
                    $errors[] = "Trek {$trek['id']} includes itself in related_trek_ids";
                }
            }
        }

        // 3. Departure checks
        $departureIds = [];
        foreach ($departures as $dep) {
            if (in_array($dep['id'], $departureIds, true)) {
                $errors[] = "Duplicate departure ID: {$dep['id']}";
            }
            $departureIds[] = $dep['id'];

            // Date calculation: end_date = start_date + duration - 1
            $start = strtotime($dep['start_date']);
            $end = strtotime($dep['end_date']);
            $expectedDays = ($end - $start) / 86400 + 1;
            if ((int)round($expectedDays) !== (int)$dep['duration_days']) {
                $errors[] = "Departure {$dep['id']} duration mismatch: start {$dep['start_date']} to end {$dep['end_date']} is {$expectedDays} days, expected {$dep['duration_days']}";
            }

            // Seats check: full status must have zero seats
            if ($dep['status'] === 'full' && $dep['sample_seats'] > 0) {
                $errors[] = "Departure {$dep['id']} is marked full but has {$dep['sample_seats']} sample_seats";
            }
        }

        // 4. Articles and Stories FK checks
        foreach ($articles as $art) {
            foreach ($art['trek_ids'] ?? [] as $tId) {
                if (!in_array($tId, $trekIds, true)) {
                    $errors[] = "Article {$art['id']} references unknown trek_id {$tId}";
                }
            }
        }
        foreach ($stories as $story) {
            if (!in_array($story['trek_id'], $trekIds, true)) {
                $errors[] = "Story {$story['id']} references unknown trek_id {$story['trek_id']}";
            }
        }

        return $errors;
    }
}
