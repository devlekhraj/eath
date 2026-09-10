<?php

namespace Website\Services;

class WebsiteRecommendationService
{
    public const VERSION = 'website-rules-v1';

    protected const WEIGHT_INTERESTS = 30;
    protected const WEIGHT_MONTH = 25;
    protected const WEIGHT_BUDGET = 25;
    protected const WEIGHT_ACCOMMODATION = 10;
    protected const WEIGHT_PACE = 10;

    /**
     * Evaluate catalog treks against user draft preferences.
     * Pure deterministic function without external dependencies or AI models.
     */
    public static function evaluate(?array $draft): array
    {
        $draft = $draft ?: [];
        $treks = WebsiteCatalogRepository::getTreks();
        $evaluatedCandidates = [];

        // Check region filter if supplied
        $regionFilter = $draft['region'] ?? null;

        // Hard filter inputs
        $availableDays = !empty($draft['available_days']) && is_numeric($draft['available_days']) ? (int) $draft['available_days'] : null;
        $maxDifficulty = !empty($draft['max_difficulty']) ? $draft['max_difficulty'] : null;
        $walkingHoursMax = !empty($draft['walking_hours_max']) && is_numeric($draft['walking_hours_max']) ? (int) $draft['walking_hours_max'] : null;

        // Soft signals inputs
        $userInterests = (array) ($draft['interests'] ?? []);
        $timingMode = $draft['timing_mode'] ?? 'unsure';
        $userMonth = !empty($draft['month']) ? (int) $draft['month'] : null;
        $budgetMaxUsd = !empty($draft['budget_max_usd']) && is_numeric($draft['budget_max_usd']) ? (int) $draft['budget_max_usd'] : null;
        $budgetIncludesFlights = $draft['budget_includes_flights'] ?? 'no';
        $userAccommodation = $draft['accommodation'] ?? 'no_preference';
        $userPace = $draft['pace'] ?? 'no_preference';
        $hasChildren = ($draft['children'] ?? 0) > 0;

        $difficultyHierarchy = [
            'easy' => 1,
            'moderate' => 2,
            'challenging' => 3,
        ];

        foreach ($treks as $trek) {
            $conflicts = [];
            $matchedSignals = [];
            $tradeoffs = [];
            $unknowns = [];

            // -----------------------------------------------------------------
            // 1. Hard Filter Checks
            // -----------------------------------------------------------------

            // Hard Filter: Region (if specified)
            if ($regionFilter && ($trek['region']['slug'] ?? '') !== $regionFilter && ($trek['region']['id'] ?? '') !== $regionFilter) {
                $conflicts[] = "Trek is in {$trek['region']['name']} region, but you selected {$regionFilter}.";
            }

            // Hard Filter: Available Days
            if ($availableDays !== null) {
                if ($trek['duration_days'] > $availableDays) {
                    $conflicts[] = "Duration ({$trek['duration_days']} days) exceeds your available time of {$availableDays} days.";
                } else {
                    $matchedSignals[] = "Duration ({$trek['duration_days']} days) fits within your {$availableDays}-day schedule.";
                }
            } else {
                $unknowns[] = "No fixed duration ceiling specified.";
            }

            // Hard Filter: Difficulty Ceiling
            if ($maxDifficulty && isset($difficultyHierarchy[$maxDifficulty])) {
                $trekDiffLevel = $difficultyHierarchy[$trek['difficulty']] ?? 2;
                $maxDiffLevel = $difficultyHierarchy[$maxDifficulty];
                if ($trekDiffLevel > $maxDiffLevel) {
                    $conflicts[] = "Difficulty rating ('" . ucfirst($trek['difficulty']) . "') exceeds your '" . ucfirst($maxDifficulty) . "' ceiling.";
                } else {
                    $matchedSignals[] = "Difficulty rating ('" . ucfirst($trek['difficulty']) . "') is within your comfortable ceiling.";
                }
            }

            // Hard Filter: Daily Walking Hours
            if ($walkingHoursMax !== null) {
                $trekWalking = $trek['walking_hours_max'] ?? null;
                if ($trekWalking !== null && $trekWalking > $walkingHoursMax) {
                    $conflicts[] = "Daily walking ({$trekWalking} hrs/day) exceeds your comfort ceiling of {$walkingHoursMax} hrs/day.";
                } elseif ($trekWalking !== null) {
                    $matchedSignals[] = "Daily walking ({$trekWalking} hrs/day) is within your {$walkingHoursMax} hrs/day ceiling.";
                }
            }

            $isEligible = empty($conflicts);

            // -----------------------------------------------------------------
            // 2. Soft Signal Scoring (Only evaluated across eligible candidates)
            // -----------------------------------------------------------------
            $points = 0;
            $availableWeight = 0;

            // Signal A: Interests (Weight: 30)
            if (!empty($userInterests)) {
                $availableWeight += self::WEIGHT_INTERESTS;
                $trekExperiences = $trek['experience_ids'] ?? [];
                $intersection = array_intersect($userInterests, $trekExperiences);
                $overlapCount = count($intersection);
                $totalUserInterests = count($userInterests);

                if ($overlapCount > 0) {
                    $points += self::WEIGHT_INTERESTS * ($overlapCount / $totalUserInterests);
                    $matchedSignals[] = "Matches {$overlapCount} of your chosen landscape interests.";
                } else {
                    $tradeoffs[] = "Does not feature your selected primary interest highlights.";
                }
            } else {
                $unknowns[] = "No specific landscape interests selected.";
            }

            // Signal B: Travel Month (Weight: 25)
            if ($userMonth !== null && $timingMode !== 'unsure') {
                $availableWeight += self::WEIGHT_MONTH;
                $suitableMonths = $trek['suitable_months'] ?? [];
                if (in_array($userMonth, $suitableMonths, true)) {
                    $points += self::WEIGHT_MONTH;
                    $matchedSignals[] = "Recommended season: ideal trail and weather conditions in your target travel month.";
                } else {
                    $tradeoffs[] = "Target month falls outside the primary recommended trekking season for this route.";
                }
            } else {
                $unknowns[] = "Travel timing is flexible; route recommended across optimal seasons.";
            }

            // Signal C: Ground Budget (Weight: 25)
            // If budget includes flights or is unsure, exclude budget from scoring
            if ($budgetMaxUsd !== null && $budgetIncludesFlights === 'no') {
                $availableWeight += self::WEIGHT_BUDGET;
                $trekPrice = $trek['price_usd'] ?? 0;
                if ($trekPrice <= $budgetMaxUsd) {
                    $points += self::WEIGHT_BUDGET;
                    $matchedSignals[] = "Ground package (\${$trekPrice} USD) is within your \${$budgetMaxUsd} USD budget guideline.";
                } else {
                    $tradeoffs[] = "Ground package rate (\${$trekPrice} USD) exceeds your guideline by \$" . ($trekPrice - $budgetMaxUsd) . " USD.";
                }
            } elseif ($budgetMaxUsd !== null && $budgetIncludesFlights !== 'no') {
                $tradeoffs[] = "Budget includes international airfare; ground package affordability not evaluated from total.";
            } else {
                $unknowns[] = "No per-person budget guideline specified.";
            }

            // Signal D: Accommodation (Weight: 10)
            if ($userAccommodation !== 'no_preference' && !empty($userAccommodation)) {
                $availableWeight += self::WEIGHT_ACCOMMODATION;
                if (($trek['accommodation'] ?? '') === $userAccommodation) {
                    $points += self::WEIGHT_ACCOMMODATION;
                    $matchedSignals[] = "Accommodation style matches your preferred comfort level.";
                } else {
                    $tradeoffs[] = "Features standard teahouse lodging rather than your requested comfort level.";
                }
            }

            // Signal E: Pace (Weight: 10)
            if ($userPace !== 'no_preference' && !empty($userPace)) {
                $availableWeight += self::WEIGHT_PACE;
                if (($trek['pace'] ?? '') === $userPace) {
                    $points += self::WEIGHT_PACE;
                    $matchedSignals[] = "Standard stage pacing matches your requested walking rhythm.";
                } else {
                    $tradeoffs[] = "Standard pacing may differ from your requested rhythm.";
                }
            }

            // Normalized Score (0.0 to 1.0)
            $normalizedScore = $availableWeight > 0 ? round($points / $availableWeight, 4) : 0.0;

            // Display Label Determination
            // Rule: Strong preference match ONLY if available_weight >= 40, normalized >= 0.75, and no tradeoffs/conflicts
            if ($isEligible && $availableWeight >= 40 && $normalizedScore >= 0.75 && empty($tradeoffs)) {
                $label = 'Strong preference match';
                $badgeVariant = 'primary';
            } elseif ($isEligible && $availableWeight > 0) {
                $label = 'Worth exploring';
                $badgeVariant = 'warm';
            } else {
                $label = 'Sample ideas to explore';
                $badgeVariant = 'neutral';
            }

            // Children Guidance
            $childrenNote = null;
            if ($hasChildren) {
                $childrenNote = "Party includes children: recommended itinerary requires customized acclimatization intervals and family room allocation.";
            }

            $evaluatedCandidates[] = [
                'trek' => $trek,
                'trek_id' => $trek['id'],
                'is_eligible' => $isEligible,
                'hard_filter_conflicts' => $conflicts,
                'raw_points' => round($points, 2),
                'available_weight' => $availableWeight,
                'normalized_score' => $normalizedScore,
                'label' => $label,
                'badge_variant' => $badgeVariant,
                'matched_signals' => array_slice($matchedSignals, 0, 3),
                'tradeoffs' => $tradeoffs,
                'unknowns' => $unknowns,
                'children_note' => $childrenNote,
                'featured_rank' => $trek['featured_rank'] ?? 99,
            ];
        }

        // Sort candidates:
        // 1. Eligible first (true > false)
        // 2. Normalized score descending
        // 3. Featured rank ascending
        // 4. Trek ID ascending for deterministic stability
        usort($evaluatedCandidates, function ($a, $b) {
            if ($a['is_eligible'] !== $b['is_eligible']) {
                return $a['is_eligible'] ? -1 : 1;
            }
            if ($a['normalized_score'] !== $b['normalized_score']) {
                return $a['normalized_score'] > $b['normalized_score'] ? -1 : 1;
            }
            if ($a['featured_rank'] !== $b['featured_rank']) {
                return $a['featured_rank'] <=> $b['featured_rank'];
            }
            return strcmp($a['trek_id'], $b['trek_id']);
        });

        // Top 3 recommendations: eligible candidates only if any exist, otherwise top 3 fallback
        $eligibleCandidates = array_values(array_filter($evaluatedCandidates, fn ($c) => $c['is_eligible']));
        $hasEligible = !empty($eligibleCandidates);
        $topRecommendations = $hasEligible ? array_slice($eligibleCandidates, 0, 3) : [];

        // Check if draft has a selected trek and evaluate it
        $selectedEvaluation = null;
        if (!empty($draft['selected_trek_id'])) {
            foreach ($evaluatedCandidates as $c) {
                if ($c['trek_id'] === $draft['selected_trek_id']) {
                    $selectedEvaluation = $c;
                    break;
                }
            }
        }

        return [
            'version' => self::VERSION,
            'has_eligible' => $hasEligible,
            'eligible_count' => count($eligibleCandidates),
            'top_recommendations' => $topRecommendations,
            'all_candidates' => $evaluatedCandidates,
            'selected_evaluation' => $selectedEvaluation,
            'active_filters' => [
                'available_days' => $availableDays,
                'max_difficulty' => $maxDifficulty,
                'walking_hours_max' => $walkingHoursMax,
                'region' => $regionFilter,
                'month' => $userMonth,
                'budget_max_usd' => $budgetMaxUsd,
            ],
        ];
    }
}
