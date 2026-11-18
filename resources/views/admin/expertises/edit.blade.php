@extends('admin.layouts.app')

@section('title', 'Edit Bidang Keahlian')
@section('page-title', 'Edit Bidang Keahlian: ' . $expertise->label)

@section('content')
<div class="card" style="max-width: 800px;">
    <div class="card-header">
        <h2 class="card-title">Form Edit Keahlian</h2>
        <a href="{{ route('admin.expertises.index') }}" class="btn btn-sm btn-ghost">← Kembali</a>
    </div>

    <form action="{{ route('admin.expertises.update', $expertise) }}" method="POST">
        @csrf
        @method('PUT')
        @include('admin.expertises._form')

        <div style="margin-top: 1.5rem;">
            <button type="submit" class="btn btn-warning">
                <span>💾</span> Simpan Perubahan
            </button>
        </div>
    </form>
</div>
@endsection

