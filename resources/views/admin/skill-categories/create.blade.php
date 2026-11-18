@extends('admin.layouts.app')

@section('title', 'Tambah Kategori Skill')
@section('page-title', 'Tambah Kategori Skill Baru')

@section('content')
<div class="card" style="max-width: 800px;">
    <div class="card-header">
        <h2 class="card-title">Form Tambah Kategori Skill</h2>
        <a href="{{ route('admin.skill-categories.index') }}" class="btn btn-sm btn-ghost">← Kembali</a>
    </div>

    <form action="{{ route('admin.skill-categories.store') }}" method="POST">
        @csrf
        @include('admin.skill-categories._form')

        <div style="margin-top: 1.5rem;">
            <button type="submit" class="btn btn-warning">
                <span>💾</span> Simpan Kategori Skill
            </button>
        </div>
    </form>
</div>
@endsection

