<?php

if (!function_exists('format_price')) {
    function format_price($amount, $currency = 'USD $')
    {
        return $currency . number_format($amount, 2);
    }
}

if (!function_exists('format_date')) {
    /**
     * Format a date string or DateTime object to a readable format.
     *
     * @param  string|\DateTime  $date
     * @param  string  $format
     * @return string
     */
    function format_date($date, $format = 'M j, Y')
    {
        if (!$date) {
            return '';
        }

        if (is_string($date)) {
            $date = new DateTime($date);
        }

        return $date->format($format);
    }
}
