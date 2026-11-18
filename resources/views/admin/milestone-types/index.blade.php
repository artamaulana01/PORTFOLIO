@extends('admin.layouts.app')

@section('title', 'Tipe Milestone')
@section('page-title', 'Manajemen Tipe Milestone')

@section('content')
<div class="card" style="max-width: 700px;">
    <div class="card-header">
        <h2 class="card-title">Daftar Tipe Milestone</h2>
        <a href="{{ route('admin.milestone-types.create') }}" class="btn btn-warning">
            <span>+</span> Tambah Tipe
        </a>
    </div>

    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th>Nama Tipe Milestone</th>
                    <th>Jumlah Milestone</th>
                    <th style="width: 140px;">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($types as $item)
                    <tr>
                        <td><strong>{{ $item->name }}</strong></td>
                        <td>
                            <a href="{{ route('admin.milestones.index') }}" style="font-weight: 700; color: #0284c7; text-decoration: underline;">
                                {{ $item->milestones_count }} riwayat
                            </a>
                        </td>
                        <td>
                            <div class="table-actions">
                                <a href="{{ route('admin.milestone-types.edit', $item) }}" class="btn btn-sm btn-ghost" title="Edit">
                                    ✏️ Edit
                                </a>
                                <form action="{{ route('admin.milestone-types.destroy', $item) }}" method="POST" class="form-delete" data-confirm="Yakin ingin menghapus tipe milestone '{{ $item->name }}'?">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" title="Hapus">
                                        🗑️
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3" style="text-align: center; color: #6b7280; padding: 2rem;">
                            Belum ada tipe milestone.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    @if ($types->hasPages())
        <div style="margin-top: 1rem;">
            {{ $types->links() }}
        </div>
    @endif
</div>
@endsection

