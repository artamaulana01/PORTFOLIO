@extends('admin.layouts.app')

@section('title', 'Tambah Prinsip Kerja')
@section('page-title', 'Tambah Prinsip Kerja Baru')

@section('content')
<div class="card" style="max-width: 700px;">
    <div class="card-header">
        <h2 class="card-title">Form Tambah Prinsip</h2>
        <a href="{{ route('admin.principles.index') }}" class="btn btn-sm btn-ghost">← Kembali</a>
    </div>

    <form action="{{ route('admin.principles.store') }}" method="POST">
        @csrf
        @include('admin.principles._form')

        <div style="margin-top: 1.5rem;">
            <button type="submit" class="btn btn-warning">
                <span>💾</span> Simpan Prinsip Kerja
            </button>
        </div>
    </form>
</div>
@endsection

