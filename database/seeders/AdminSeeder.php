<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use RuntimeException;

class AdminSeeder extends Seeder
{
    /**
     * Jalankan seeder akun administrator.
     */
    public function run(): void
    {
        $name = config('admin.name', 'Admin Portfolio');
        $email = config('admin.email');
        $password = config('admin.password');

        if (empty($email)) {
            throw new RuntimeException('Nilai ADMIN_EMAIL belum diatur di file .env. Silakan lengkapi konfigurasi akun admin.');
        }

        if (empty($password)) {
            throw new RuntimeException('Nilai ADMIN_PASSWORD belum diatur di file .env. Silakan isi password administrator terlebih dahulu sebelum menjalankan seeder.');
        }

        Admin::updateOrCreate(
            ['email' => $email],
            [
                'name' => $name,
                'password' => Hash::make($password),
            ]
        );
    }
}

