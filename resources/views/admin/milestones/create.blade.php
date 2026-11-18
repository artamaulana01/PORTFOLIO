@extends('admin.layouts.app')

@section('title', 'Tambah Milestone')
@section('page-title', 'Tambah Riwayat Milestone Baru')

@section('content')
<div class="card" style="max-width: 800px;">
    <div class="card-header">
        <h2 class="card-title">Form Tambah Milestone</h2>
        <a href="{{ route('admin.milestones.index') }}" class="btn btn-sm btn-ghost">← Kembali</a>
    </div>

    <form action="{{ route('admin.milestones.store') }}" method="POST">
        @csrf
        @include('admin.milestones._form')

        <div style="margin-top: 2rem;">
            <button type="submit" class="btn btn-warning">
                <span>💾</span> Simpan Milestone Lengkap
            </button>
        </div>
    </form>
</div>
@endsection

