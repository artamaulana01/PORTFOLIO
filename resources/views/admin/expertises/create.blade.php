@extends('admin.layouts.app')

@section('title', 'Tambah Bidang Keahlian')
@section('page-title', 'Tambah Bidang Keahlian Baru')

@section('content')
<div class="card" style="max-width: 800px;">
    <div class="card-header">
        <h2 class="card-title">Form Tambah Keahlian</h2>
        <a href="{{ route('admin.expertises.index') }}" class="btn btn-sm btn-ghost">← Kembali</a>
    </div>

    <form action="{{ route('admin.expertises.store') }}" method="POST">
        @csrf
        @include('admin.expertises._form')

        <div style="margin-top: 1.5rem;">
            <button type="submit" class="btn btn-warning">
                <span>💾</span> Simpan Bidang Keahlian
            </button>
        </div>
    </form>
</div>
@endsection

