@extends('admin.layouts.app')

@section('title', 'Edit Tipe Milestone')
@section('page-title', 'Edit Tipe Milestone: ' . $type->name)

@section('content')
<div class="card" style="max-width: 600px;">
    <div class="card-header">
        <h2 class="card-title">Form Edit Tipe Milestone</h2>
        <a href="{{ route('admin.milestone-types.index') }}" class="btn btn-sm btn-ghost">← Kembali</a>
    </div>

    <form action="{{ route('admin.milestone-types.update', $type) }}" method="POST">
        @csrf
        @method('PUT')
        @include('admin.milestone-types._form')

        <div style="margin-top: 1.5rem;">
            <button type="submit" class="btn btn-warning">
                <span>💾</span> Simpan Perubahan
            </button>
        </div>
    </form>
</div>
@endsection

