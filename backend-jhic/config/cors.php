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

    'paths' => ['api/*', 'sanctum/csrf-cookie'],

    'allowed_methods' => ['*'],

    'allowed_origins' => [
        'http://localhost:5173', // alamat frontend React kamu
        'http://127.0.0.1:5173',
        'http://localhost:5174', // tambahkan ini
        'http://127.0.0.1:5174',
        'http://localhost:3000', // alternatif localhost
    ],

    'allowed_origins_patterns' => [],

    'allowed_headers' => ['*'],

    'exposed_headers' => [],

    'max_age' => 0,

    'supports_credentials' => false, // penting untuk Sanctum (cookie auth)
];
