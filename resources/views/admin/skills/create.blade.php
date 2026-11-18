@extends('admin.layouts.app')

@section('title', 'Tambah Skill')
@section('page-title', 'Tambah Skill Baru')

@section('content')
<div class="card" style="max-width: 700px;">
    <div class="card-header">
        <h2 class="card-title">Form Tambah Skill</h2>
        <a href="{{ route('admin.skills.index') }}" class="btn btn-sm btn-ghost">← Kembali</a>
    </div>

    <form action="{{ route('admin.skills.store') }}" method="POST">
        @csrf
        @include('admin.skills._form')

        <div style="margin-top: 1.5rem;">
            <button type="submit" class="btn btn-warning">
                <span>💾</span> Simpan Skill
            </button>
        </div>
    </form>
</div>
@endsection

