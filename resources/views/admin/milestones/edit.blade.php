@extends('admin.layouts.app')

@section('title', 'Edit Milestone')
@section('page-title', 'Edit Milestone: ' . $milestone->title)

@section('content')
<div class="card" style="max-width: 800px;">
    <div class="card-header">
        <h2 class="card-title">Form Edit Milestone</h2>
        <a href="{{ route('admin.milestones.index') }}" class="btn btn-sm btn-ghost">← Kembali</a>
    </div>

    <form action="{{ route('admin.milestones.update', $milestone) }}" method="POST">
        @csrf
        @method('PUT')
        @include('admin.milestones._form')

        <div style="margin-top: 2rem;">
            <button type="submit" class="btn btn-warning">
                <span>💾</span> Simpan Perubahan Milestone
            </button>
        </div>
    </form>
</div>
@endsection

