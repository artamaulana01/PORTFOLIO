<?php

namespace Tests\Feature;

use App\Models\Profile;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Halaman beranda portofolio publik berhasil dimuat (200 OK).
     */
    public function test_the_application_returns_a_successful_response(): void
    {
        Profile::create([
            'name' => 'Arta Maulana',
            'short_title' => 'Web Developer',
            'role' => 'Fullstack Developer',
            'headline' => 'Headline Test',
            'tagline' => 'Tagline Test',
            'education' => 'Universitas Muhammadiyah Sukabumi',
            'email' => 'arta@example.com',
            'location' => 'Indonesia',
            'timezone' => 'Asia/Jakarta',
            'tz_label' => 'WIB',
        ]);

        $response = $this->get('/');

        $response->assertStatus(200);
    }
}
