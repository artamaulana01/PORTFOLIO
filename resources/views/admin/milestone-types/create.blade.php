@extends('admin.layouts.app')

@section('title', 'Tambah Tipe Milestone')
@section('page-title', 'Tambah Tipe Milestone Baru')

@section('content')
<div class="card" style="max-width: 600px;">
    <div class="card-header">
        <h2 class="card-title">Form Tambah Tipe Milestone</h2>
        <a href="{{ route('admin.milestone-types.index') }}" class="btn btn-sm btn-ghost">← Kembali</a>
    </div>

    <form action="{{ route('admin.milestone-types.store') }}" method="POST">
        @csrf
        @include('admin.milestone-types._form')

        <div style="margin-top: 1.5rem;">
            <button type="submit" class="btn btn-warning">
                <span>💾</span> Simpan Tipe
            </button>
        </div>
    </form>
</div>
@endsection

