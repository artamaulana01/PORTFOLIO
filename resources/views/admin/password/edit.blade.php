@extends('admin.layouts.app')

@section('title', 'Ubah Password')
@section('page-title', 'Keamanan Akun & Ubah Password')

@section('content')
<div style="max-width: 600px;">
    <div class="card">
        <div class="card-header">
            <h2 class="card-title">Perbarui Password Administrator</h2>
        </div>

        <form action="{{ route('admin.password.update') }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="current_password" class="form-label">Password Saat Ini <span class="required">*</span></label>
                <input type="password" name="current_password" id="current_password" class="form-input" required placeholder="Masukkan password saat ini">
                @error('current_password')
                    <span class="form-error">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="password" class="form-label">Password Baru <span class="required">*</span></label>
                <input type="password" name="password" id="password" class="form-input" required placeholder="Minimal 8 karakter">
                @error('password')
                    <span class="form-error">{{ $message }}</span>
                @enderror
                <span class="form-help">Gunakan kombinasi huruf, angka, dan simbol untuk keamanan maksimal.</span>
            </div>

            <div class="form-group">
                <label for="password_confirmation" class="form-label">Konfirmasi Password Baru <span class="required">*</span></label>
                <input type="password" name="password_confirmation" id="password_confirmation" class="form-input" required placeholder="Ulangi password baru">
            </div>

            <div style="margin-top: 1.5rem;">
                <button type="submit" class="btn btn-warning">
                    <span>💾</span> Simpan Password Baru
                </button>
            </div>
        </form>
    </div>
</div>
@endsection

