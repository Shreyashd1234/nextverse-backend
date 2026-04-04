<?php

return [

    'paths' => [
        'api/*',
        'sanctum/csrf-cookie',
        'login',
        'logout',
    ],

    'allowed_methods' => ['*'],

    // Credentials require an explicit trusted origin; wildcard (*) is invalid with cookies.
    'allowed_origins' => ['https://nextverse-frontend.vercel.app'],

    // Keep local SPA development working without relaxing production origins.
    'allowed_origins_patterns' => [
        '#^http://localhost(:\\d+)?$#',
        '#^http://127\\.0\\.0\\.1(:\\d+)?$#',
    ],

    'allowed_headers' => ['*'],

    'exposed_headers' => [],

    'max_age' => 0,

    'supports_credentials' => true,

];
