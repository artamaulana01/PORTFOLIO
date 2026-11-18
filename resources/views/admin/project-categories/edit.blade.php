@extends('admin.layouts.app')

@section('title', 'Edit Kategori Proyek')
@section('page-title', 'Edit Kategori: ' . $category->name)

@section('content')
<div class="card" style="max-width: 650px;">
    <div class="card-header">
        <h2 class="card-title">Form Edit Kategori Proyek</h2>
        <a href="{{ route('admin.project-categories.index') }}" class="btn btn-sm btn-ghost">← Kembali</a>
    </div>

    <form action="{{ route('admin.project-categories.update', $category) }}" method="POST">
        @csrf
        @method('PUT')
        @include('admin.project-categories._form')

        <div style="margin-top: 1.5rem;">
            <button type="submit" class="btn btn-warning">
                <span>💾</span> Simpan Perubahan
            </button>
        </div>
    </form>
</div>
@endsection

