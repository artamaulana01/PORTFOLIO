@extends('admin.layouts.app')

@section('title', 'Edit Topik Kontak')
@section('page-title', 'Edit Topik Kontak: ' . $topic->label)

@section('content')
<div class="card" style="max-width: 600px;">
    <div class="card-header">
        <h2 class="card-title">Form Edit Topik Kontak</h2>
        <a href="{{ route('admin.contact-topics.index') }}" class="btn btn-sm btn-ghost">← Kembali</a>
    </div>

    <form action="{{ route('admin.contact-topics.update', $topic) }}" method="POST">
        @csrf
        @method('PUT')
        @include('admin.contact-topics._form')

        <div style="margin-top: 1.5rem;">
            <button type="submit" class="btn btn-warning">
                <span>💾</span> Simpan Perubahan
            </button>
        </div>
    </form>
</div>
@endsection

