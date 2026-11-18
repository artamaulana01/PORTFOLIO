<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProfileRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'short_title' => ['required', 'string', 'max:255'],
            'role' => ['required', 'string', 'max:255'],
            'headline' => ['required', 'string', 'max:255'],
            'tagline' => ['required', 'string'],
            'education' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'github' => ['nullable', 'url', 'max:255'],
            'linkedin' => ['nullable', 'url', 'max:255'],
            'location' => ['required', 'string', 'max:255'],
            'timezone' => ['required', 'string', 'max:50'],
            'tz_label' => ['required', 'string', 'max:10'],
            'photo' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp,svg', 'max:2048'],
            'cv' => ['nullable', 'mimes:pdf', 'max:5120'],
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Nama lengkap wajib diisi.',
            'short_title.required' => 'Judul pendek / profesi wajib diisi.',
            'role.required' => 'Peran / spesialisasi wajib diisi.',
            'headline.required' => 'Headline profil wajib diisi.',
            'tagline.required' => 'Tagline profil wajib diisi.',
            'education.required' => 'Pendidikan wajib diisi.',
            'email.required' => 'Alamat email wajib diisi.',
            'email.email' => 'Format email tidak valid.',
            'github.url' => 'Format URL GitHub tidak valid.',
            'linkedin.url' => 'Format URL LinkedIn tidak valid.',
            'location.required' => 'Lokasi wajib diisi.',
            'timezone.required' => 'Zona waktu wajib diisi.',
            'tz_label.required' => 'Label zona waktu wajib diisi.',
            'photo.image' => 'Berkas foto profil harus berupa gambar.',
            'photo.mimes' => 'Format foto harus berupa JPG, JPEG, PNG, WEBP, atau SVG.',
            'photo.max' => 'Ukuran foto profil maksimal 2 MB.',
            'cv.mimes' => 'Berkas CV harus berformat PDF.',
            'cv.max' => 'Ukuran berkas CV maksimal 5 MB.',
        ];
    }
}

