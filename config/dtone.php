<?php

return [
    /*
    |--------------------------------------------------------------------------
    | api key for dtone
    |--------------------------------------------------------------------------
    |
    | Here you may configure the log settings for when a location is not found
    | for the IP provided.
    |
    */
    'key' => env('DTONE_API_KEY', ''),
    'secret' => env('DTONE_API_SECRET', ''),

    /*
    |--------------------------------------------------------------------------
    | api key for dtone test key
    |--------------------------------------------------------------------------
    |
    | Here you may configure the log settings for when a location is not found
    | for the IP provided.
    |
    */
    'test_key' => env('DTONE_TEST_KEY', ''),
    'test_secret' => env('DTONE_TEST_SECRET', ''),

    /*
    |--------------------------------------------------------------------------
    | api key for dtone
    |--------------------------------------------------------------------------
    |
    | Here you may configure the log settings for when a location is not found
    | for the IP provided.
    |
    */
    'is_production' => env('DTONE_IS_PRODUCTION', false),
];
