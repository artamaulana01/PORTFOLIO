@extends('admin.layouts.app')

@section('title', 'Edit Proyek')
@section('page-title', 'Edit Proyek: ' . $project->title)

@section('content')
<div class="card" style="max-width: 900px;">
    <div class="card-header">
        <h2 class="card-title">Form Edit Proyek</h2>
        <a href="{{ route('admin.projects.index') }}" class="btn btn-sm btn-ghost">← Kembali</a>
    </div>

    <form action="{{ route('admin.projects.update', $project) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        @include('admin.projects._form')

        <div style="margin-top: 2rem;">
            <button type="submit" class="btn btn-warning">
                <span>💾</span> Simpan Perubahan Proyek
            </button>
        </div>
    </form>
</div>
@endsection

