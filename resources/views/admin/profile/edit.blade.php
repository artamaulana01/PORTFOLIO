@extends('admin.layouts.app')

@section('title', 'Edit Profil')
@section('page-title', 'Kelola Data Diri Profil Portofolio')

@section('content')
<div class="card">
    <div class="card-header">
        <h2 class="card-title">Informasi Pribadi & Kontak</h2>
        <span class="badge badge-mint">Sinkron ke Website Publik</span>
    </div>

    <form action="{{ route('admin.profile.update') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-row">
            <div class="form-group">
                <label for="name" class="form-label">Nama Lengkap <span class="required">*</span></label>
                <input type="text" name="name" id="name" class="form-input" value="{{ old('name', $profile->name) }}" required>
                @error('name') <span class="form-error">{{ $message }}</span> @enderror
            </div>

            <div class="form-group">
                <label for="short_title" class="form-label">Judul Singkat / Profesi <span class="required">*</span></label>
                <input type="text" name="short_title" id="short_title" class="form-input" value="{{ old('short_title', $profile->short_title) }}" required placeholder="contoh: Web Developer">
                @error('short_title') <span class="form-error">{{ $message }}</span> @enderror
            </div>

            <div class="form-group">
                <label for="role" class="form-label">Peran Utama (Role) <span class="required">*</span></label>
                <input type="text" name="role" id="role" class="form-input" value="{{ old('role', $profile->role) }}" required placeholder="contoh: Full-Stack Developer">
                @error('role') <span class="form-error">{{ $message }}</span> @enderror
            </div>
        </div>

        <div class="form-group">
            <label for="headline" class="form-label">Headline Section Profil <span class="required">*</span></label>
            <input type="text" name="headline" id="headline" class="form-input" value="{{ old('headline', $profile->headline) }}" required placeholder="contoh: Web Developer & Mobile Enthusiast">
            @error('headline') <span class="form-error">{{ $message }}</span> @enderror
        </div>

        <div class="form-group">
            <label for="tagline" class="form-label">Tagline (Deskripsi Singkat Hero) <span class="required">*</span></label>
            <textarea name="tagline" id="tagline" class="form-textarea" rows="3" required>{{ old('tagline', $profile->tagline) }}</textarea>
            @error('tagline') <span class="form-error">{{ $message }}</span> @enderror
        </div>

        <div class="form-row">
            <div class="form-group">
                <label for="education" class="form-label">Pendidikan Terakhir <span class="required">*</span></label>
                <input type="text" name="education" id="education" class="form-input" value="{{ old('education', $profile->education) }}" required>
                @error('education') <span class="form-error">{{ $message }}</span> @enderror
            </div>

            <div class="form-group">
                <label for="email" class="form-label">Alamat Email Publik <span class="required">*</span></label>
                <input type="email" name="email" id="email" class="form-input" value="{{ old('email', $profile->email) }}" required>
                @error('email') <span class="form-error">{{ $message }}</span> @enderror
            </div>
        </div>

        <div class="form-row">
            <div class="form-group">
                <label for="github" class="form-label">URL GitHub</label>
                <input type="url" name="github" id="github" class="form-input" value="{{ old('github', $profile->github) }}" placeholder="https://github.com/username">
                @error('github') <span class="form-error">{{ $message }}</span> @enderror
            </div>

            <div class="form-group">
                <label for="linkedin" class="form-label">URL LinkedIn</label>
                <input type="url" name="linkedin" id="linkedin" class="form-input" value="{{ old('linkedin', $profile->linkedin) }}" placeholder="https://linkedin.com/in/username">
                @error('linkedin') <span class="form-error">{{ $message }}</span> @enderror
            </div>
        </div>

        <div class="form-row">
            <div class="form-group">
                <label for="location" class="form-label">Lokasi Domisili <span class="required">*</span></label>
                <input type="text" name="location" id="location" class="form-input" value="{{ old('location', $profile->location) }}" required placeholder="contoh: Sukabumi, Indonesia">
                @error('location') <span class="form-error">{{ $message }}</span> @enderror
            </div>

            <div class="form-group">
                <label for="timezone" class="form-label">Zona Waktu (PHP Timezone) <span class="required">*</span></label>
                <input type="text" name="timezone" id="timezone" class="form-input" value="{{ old('timezone', $profile->timezone) }}" required placeholder="contoh: Asia/Jakarta">
                @error('timezone') <span class="form-error">{{ $message }}</span> @enderror
            </div>

            <div class="form-group">
                <label for="tz_label" class="form-label">Label Zona Waktu <span class="required">*</span></label>
                <input type="text" name="tz_label" id="tz_label" class="form-input" value="{{ old('tz_label', $profile->tz_label) }}" required placeholder="WIB">
                @error('tz_label') <span class="form-error">{{ $message }}</span> @enderror
            </div>
        </div>

        <hr style="margin: 1.5rem 0; border: none; border-top: 1.5px solid #e5e7eb;">

        <div class="form-row">
            <div class="form-group">
                <label for="photo" class="form-label">Unggah Foto Profil Baru</label>
                <input type="file" name="photo" id="photo" class="form-input" accept="image/jpeg,image/png,image/webp,image/svg+xml">
                <span class="form-help">Format: JPG, PNG, WEBP, atau SVG. Maksimal 2 MB.</span>
                @error('photo') <span class="form-error">{{ $message }}</span> @enderror

                @if ($profile->photo_path)
                    <div style="margin-top: 0.8rem; display: flex; align-items: center; gap: 0.8rem;">
                        <img src="{{ asset($profile->photo_path) }}" alt="Foto saat ini" style="width: 60px; height: 60px; border-radius: 8px; border: 2px solid var(--ink); object-fit: cover;">
                        <span style="font-size: 0.75rem; color: #4b5563;">Foto saat ini: <code>{{ $profile->photo_path }}</code></span>
                    </div>
                @endif
            </div>

            <div class="form-group">
                <label for="cv" class="form-label">Unggah Berkas CV Baru (PDF)</label>
                <input type="file" name="cv" id="cv" class="form-input" accept="application/pdf">
                <span class="form-help">Format: PDF. Maksimal 5 MB.</span>
                @error('cv') <span class="form-error">{{ $message }}</span> @enderror

                @if ($profile->cv_path)
                    <div style="margin-top: 0.8rem;">
                        <a href="{{ asset($profile->cv_path) }}" target="_blank" class="btn btn-sm btn-ghost">
                            <span>📄</span> Lihat Berkas CV Saat Ini ↗
                        </a>
                    </div>
                @endif
            </div>
        </div>

        <div style="margin-top: 2rem;">
            <button type="submit" class="btn btn-warning">
                <span>💾</span> Simpan Perubahan Profil
            </button>
        </div>
    </form>
</div>
@endsection

