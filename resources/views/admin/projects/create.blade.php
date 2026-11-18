@extends('admin.layouts.app')

@section('title', 'Tambah Proyek')
@section('page-title', 'Tambah Proyek Baru')

@section('content')
<div class="card" style="max-width: 900px;">
    <div class="card-header">
        <h2 class="card-title">Form Tambah Proyek</h2>
        <a href="{{ route('admin.projects.index') }}" class="btn btn-sm btn-ghost">← Kembali</a>
    </div>

    <form action="{{ route('admin.projects.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @include('admin.projects._form')

        <div style="margin-top: 2rem;">
            <button type="submit" class="btn btn-warning">
                <span>💾</span> Simpan Proyek Lengkap
            </button>
        </div>
    </form>
</div>
@endsection

