<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Mailgun, Postmark, AWS and more. This file provides the de facto
    | location for this type of information, allowing packages to have
    | a conventional file to locate the various service credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
        'endpoint' => env('MAILGUN_ENDPOINT', 'api.mailgun.net'),
        'scheme' => 'https',
    ],

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],

    'authorize_net' => [
        'environment'     => env('AUTHORIZE_NET_ENV', 'sandbox'),
        'api_login_id'    => env('AUTHORIZE_NET_API_LOGIN_ID'),
        'transaction_key' => env('AUTHORIZE_NET_TRANSACTION_KEY'),
        'client_key'      => env('AUTHORIZE_NET_CLIENT_KEY'),
        'signature_key'   => env('AUTHORIZE_NET_SIGNATURE_KEY'),
    ],

    'ghl' => [
        'popup_webhook'      => env('GHL_POPUP_WEBHOOK'),
        'onboarding_webhook' => env('GHL_ONBOARDING_WEBHOOK'),
        'lead_webhook'       => env('GHL_LEAD_WEBHOOK'),
        'payment_webhook'    => env('GHL_PAYMENT_WEBHOOK'),
    ],

    'crc' => [
        'api_key'    => env('CRC_API_KEY'),
        'secret_key' => env('CRC_SECRET_KEY'),
        'base_url'   => env('CRC_BASE_URL', 'https://app.creditrepaircloud.com/api'),
    ],

];
