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
    'google' => [
        'client_id' => '509361200419-05fb735jdprnkrdcdhf937lmc59199bf.apps.googleusercontent.com',
        'client_secret' => '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',
        'redirect' => 'http://127.0.0.1:8000/auth/google/callback',

    ],
    'facebook' => [
        'client_id' => '437073275434393',
        'client_secret' => '22baa42801b3adfae7a04bb9b44e0bd5',
        'redirect' => 'http://127.0.0.1:8000/auth/facebook/callback',

    ]

];
