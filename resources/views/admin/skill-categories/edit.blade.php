@extends('admin.layouts.app')

@section('title', 'Edit Kategori Skill')
@section('page-title', 'Edit Kategori: ' . $category->name)

@section('content')
<div class="card" style="max-width: 800px;">
    <div class="card-header">
        <h2 class="card-title">Form Edit Kategori Skill</h2>
        <a href="{{ route('admin.skill-categories.index') }}" class="btn btn-sm btn-ghost">← Kembali</a>
    </div>

    <form action="{{ route('admin.skill-categories.update', $category) }}" method="POST">
        @csrf
        @method('PUT')
        @include('admin.skill-categories._form')

        <div style="margin-top: 1.5rem;">
            <button type="submit" class="btn btn-warning">
                <span>💾</span> Simpan Perubahan
            </button>
        </div>
    </form>
</div>
@endsection

