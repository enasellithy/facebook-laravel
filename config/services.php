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
        'region' => 'us-east-1',
    ],

    'sparkpost' => [
        'secret' => env('SPARKPOST_SECRET'),
    ],

    'stripe' => [
        'model' => App\User::class,
        'key' => env('STRIPE_KEY'),
        'secret' => env('STRIPE_SECRET'),
    ],
    
    'facebook' => [
        'client_id' => '1411178165623168',
        'client_secret' => '4252c942a589871e78df5ceb0eff6041',
        'redirect' => 'http://laravel-vuejs-enas123.c9users.io/blog/auth/facebook/callback',
    ],

    'github' => [
        'client_id' => '5a8f5a7944e75969d4d6',
        'client_secret' => 'da351e75f6d625a378936d45449712d30beaa837',
        'redirect' => 'http://laravel-vuejs-enas123.c9users.io/blog/auth/github/callback',
    ],
    
    'google' => [
        'client_id' => '443291432625-0dai5eeim6m0ass9tlgpl236mc36au41.apps.googleusercontent.com',
        'client_secret' => 'BWroXg0WRD2dC3HGyd87zEuY',
        'redirect' => 'http://laravel-vuejs-enas123.c9users.io/blog/auth/github/callback',
    ],

];
