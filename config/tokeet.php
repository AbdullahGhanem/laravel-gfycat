<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Tokeet API Key
    |--------------------------------------------------------------------------
    |
    | Your Tokeet API key used to authenticate requests to the Tokeet API.
    | You can find this in your Tokeet account under Settings > API.
    |
    */
    'api_key' => env('TOKEET_API_KEY', ''),

    /*
    |--------------------------------------------------------------------------
    | Tokeet Account ID
    |--------------------------------------------------------------------------
    |
    | Your Tokeet account ID. This is required for all API requests.
    |
    */
    'account_id' => env('TOKEET_ACCOUNT_ID', ''),

    /*
    |--------------------------------------------------------------------------
    | Tokeet API Base URL
    |--------------------------------------------------------------------------
    |
    | The base URL for the Tokeet API.
    |
    */
    'base_url' => env('TOKEET_API_URL', 'https://capi.tokeet.com/v1'),
];
