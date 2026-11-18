<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Konfigurasi Akun Administrator Awal
    |--------------------------------------------------------------------------
    |
    | Nilai ini dibaca dari file .env dan digunakan oleh AdminSeeder untuk
    | membuat atau memperbarui akun administrator sistem portofolio.
    |
    */
    'name' => env('ADMIN_NAME', 'Admin Portfolio'),
    'email' => env('ADMIN_EMAIL'),
    'password' => env('ADMIN_PASSWORD'),
];

