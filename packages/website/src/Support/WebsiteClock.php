<?php

namespace Website\Support;

use Carbon\CarbonImmutable;

class WebsiteClock
{
    /**
     * Get the fixed illustrative website calendar date (ISO format Y-m-d).
     */
    public static function date(): string
    {
        return config('website.calendar_date', '2030-09-01');
    }

    public static function websiteDateString(): string
    {
        return self::date();
    }

    /**
     * Get Carbon instance of the fixed website date.
     */
    public static function now(): CarbonImmutable
    {
        return CarbonImmutable::parse(self::date(), 'UTC');
    }

    public static function websiteDate(): CarbonImmutable
    {
        return self::now();
    }

    /**
     * Get the integer month (1-12) of the website date.
     */
    public static function month(): int
    {
        return self::now()->month;
    }

    /**
     * Get the integer year of the website date.
     */
    public static function year(): int
    {
        return self::now()->year;
    }

    /**
     * Human readable disclosure string for date-sensitive website screens.
     */
    public static function disclosure(): string
    {
        return 'Sample calendar: September 2030';
    }

    /**
     * Real system clock for session TTL and ephemeral expiry.
     */
    public static function realTimestamp(): int
    {
        return time();
    }
}
