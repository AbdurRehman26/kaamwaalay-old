<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Stripe, Mailgun, SparkPost and others. This file provides a sane
    | default location for this type of information, allowing packages
    | to have a conventional place to find your various credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
    ],

    'ses' => [
        'key' => env('SES_KEY'),
        'secret' => env('SES_SECRET'),
        'region' => env('SES_REGION', 'us-east-1'),
    ],

    'sparkpost' => [
        'secret' => env('SPARKPOST_SECRET'),
    ],

    'stripe' => [
        'model' => \App\Models\User::class,
        'key' => env('STRIPE_KEY'),
        'secret' => env('STRIPE_SECRET'),
        'url' => env('STRIPE_URL'),
        'currency' => env('STRIPE_CURRENCY'),
    ],
    'onesignal' => [
        'app_id' => env('ONESIGNAL_APP_ID'),
        'rest_api_key' => env('ONESIGNAL_REST_API_KEY')
    ],  
    'facebook' => [
        'client_id' => '',         
        'client_secret' => '',
        'redirect' => '',
    ],
    'google_api_key'=> env('GOOGLE_API_KEY', 'AIzaSyAR40p-AIzaSyCgc4AbNtACxOR6xwPM4Z6cc7E9ipMEW88'),
    'facebook_api_key'=> env('FACEBOOK_APP_ID', '212566316088719'),
];
