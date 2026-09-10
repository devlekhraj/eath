<?php

namespace Website\Support;

class WebsiteMoneyFormatter
{
    /**
     * Format integer cents into USD currency string (e.g. 179000 -> "$1,790").
     */
    public static function format(?int $cents, string $currency = 'USD'): string
    {
        if ($cents === null) {
            return 'Price on request';
        }

        $dollars = (int) round($cents / 100);

        return '$' . number_format($dollars);
    }

    /**
     * Alias for format(?int $cents) in USD.
     */
    public static function formatUsd(?int $cents): string
    {
        return self::format($cents, 'USD');
    }

    /**
     * Format integer cents with explicit cents if non-zero.
     */
    public static function formatExact(?int $cents, string $currency = 'USD'): string
    {
        if ($cents === null) {
            return 'Price on request';
        }

        $amount = $cents / 100;

        return '$' . number_format($amount, 2);
    }

    /**
     * Convert integer cents to integer dollars.
     */
    public static function toDollars(?int $cents): ?int
    {
        return $cents !== null ? (int) round($cents / 100) : null;
    }

    /**
     * Convert integer dollars to integer cents.
     */
    public static function toCents(?int $dollars): ?int
    {
        return $dollars !== null ? $dollars * 100 : null;
    }
}
