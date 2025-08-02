<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Asaas API Environment
    |--------------------------------------------------------------------------
    |
    | This value determines the environment your application is running in.
    | Options: 'production', 'sandbox'
    |
    */
    'environment' => env('ASAAS_ENV', 'sandbox'),

    /*
    |--------------------------------------------------------------------------
    | Asaas API Key
    |--------------------------------------------------------------------------
    |
    | Your Asaas API key. You can find this in your Asaas dashboard.
    |
    */
    'api_key' => env('ASAAS_API_KEY', ''),

    /*
    |--------------------------------------------------------------------------
    | API Version
    |--------------------------------------------------------------------------
    |
    | The version of the Asaas API you want to use.
    |
    */
    'api_version' => 'v3',

    /*
    |--------------------------------------------------------------------------
    | API Base URLs
    |--------------------------------------------------------------------------
    |
    | Base URLs for the Asaas API in different environments.
    |
    */
    'base_url' => [
        'production' => 'https://www.asaas.com/api/v3',
        'sandbox' => 'https://sandbox.asaas.com/api/v3',
    ],

    /*
    |--------------------------------------------------------------------------
    | API Timeout
    |--------------------------------------------------------------------------
    |
    | The timeout in seconds for API requests.
    |
    */
    'timeout' => 30,

    /*
    |--------------------------------------------------------------------------
    | API Retry Attempts
    |--------------------------------------------------------------------------
    |
    | Number of times to retry failed API requests.
    |
    */
    'retry_attempts' => 3,

    /*
    |--------------------------------------------------------------------------
    | API Retry Delay
    |--------------------------------------------------------------------------
    |
    | Delay in seconds between retry attempts.
    |
    */
    'retry_delay' => 1,
];
