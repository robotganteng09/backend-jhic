<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Cross-Origin Resource Sharing (CORS) Configuration
    |--------------------------------------------------------------------------
    |
    | Di sini kamu bisa atur domain frontend (React) yang boleh akses API backend.
    | Biasanya React jalan di http://localhost:5173 (Vite default).
    |
    */

    'paths' => ['api/*', 'sanctum/csrf-cookie', 'login', 'logout', 'register'],

    'allowed_methods' => ['*'],

    'allowed_origins' => [
        'http://localhost:5173', // alamat frontend React kamu
        'http://127.0.0.1:5173', // alternatif localhost
    ],

    'allowed_origins_patterns' => [],

    'allowed_headers' => ['*'],

    'exposed_headers' => [],

    'max_age' => 0,

    'supports_credentials' => true, // penting untuk Sanctum (cookie auth)
];
