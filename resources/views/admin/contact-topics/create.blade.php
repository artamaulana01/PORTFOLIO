@extends('admin.layouts.app')

@section('title', 'Tambah Topik Kontak')
@section('page-title', 'Tambah Topik Diskusi Kontak Baru')

@section('content')
<div class="card" style="max-width: 600px;">
    <div class="card-header">
        <h2 class="card-title">Form Tambah Topik Kontak</h2>
        <a href="{{ route('admin.contact-topics.index') }}" class="btn btn-sm btn-ghost">← Kembali</a>
    </div>

    <form action="{{ route('admin.contact-topics.store') }}" method="POST">
        @csrf
        @include('admin.contact-topics._form')

        <div style="margin-top: 1.5rem;">
            <button type="submit" class="btn btn-warning">
                <span>💾</span> Simpan Topik
            </button>
        </div>
    </form>
</div>
@endsection

