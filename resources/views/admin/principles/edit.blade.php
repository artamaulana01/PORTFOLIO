@extends('admin.layouts.app')

@section('title', 'Edit Prinsip Kerja')
@section('page-title', 'Edit Prinsip: ' . $principle->title)

@section('content')
<div class="card" style="max-width: 700px;">
    <div class="card-header">
        <h2 class="card-title">Form Edit Prinsip</h2>
        <a href="{{ route('admin.principles.index') }}" class="btn btn-sm btn-ghost">← Kembali</a>
    </div>

    <form action="{{ route('admin.principles.update', $principle) }}" method="POST">
        @csrf
        @method('PUT')
        @include('admin.principles._form')

        <div style="margin-top: 1.5rem;">
            <button type="submit" class="btn btn-warning">
                <span>💾</span> Simpan Perubahan
            </button>
        </div>
    </form>
</div>
@endsection

