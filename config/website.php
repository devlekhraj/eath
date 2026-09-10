<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Website Preview Feature Gate
    |--------------------------------------------------------------------------
    |
    | When enabled, the traveler-facing website preview routes under /website are accessible.
    | Defaults to true in local and testing environments; false elsewhere.
    |
    */
    'enabled' => env('WEBSITE_ENABLED', env('APP_ENV') === 'local' || env('APP_ENV') === 'testing'),

    /*
    |--------------------------------------------------------------------------
    | Route Configurations
    |--------------------------------------------------------------------------
    */
    'route_prefix' => 'website',
    'route_name_prefix' => 'website.',

    /*
    |--------------------------------------------------------------------------
    | Website Fixed Clock & Currency
    |--------------------------------------------------------------------------
    |
    | An illustrative fixed calendar date (1 September 2030) ensures deterministic
    | departures and seasonal calculations without depending on real-time clock.
    | State TTLs use the real system clock.
    |
    */
    'calendar_date' => '2030-09-01',
    'currency' => 'USD',

    /*
    |--------------------------------------------------------------------------
    | Session Storage Isolation
    |--------------------------------------------------------------------------
    */
    'session_prefix' => 'eath_website_v1.',
    'session_ttl_minutes' => 120,
];
