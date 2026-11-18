@extends('admin.layouts.app')

@section('title', 'Prinsip Kerja')
@section('page-title', 'Manajemen Prinsip Kerja (Engineering Principles)')

@section('content')
<div class="card">
    <div class="card-header">
        <h2 class="card-title">Daftar Prinsip Kerja</h2>
        <a href="{{ route('admin.principles.create') }}" class="btn btn-warning">
            <span>+</span> Tambah Prinsip
        </a>
    </div>

    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th style="width: 70px;">Urutan</th>
                    <th>Judul Prinsip</th>
                    <th>Deskripsi</th>
                    <th style="width: 140px;">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($principles as $item)
                    <tr>
                        <td><span class="badge badge-mint">{{ $item->sort_order }}</span></td>
                        <td><strong>{{ $item->title }}</strong></td>
                        <td>{{ $item->description }}</td>
                        <td>
                            <div class="table-actions">
                                <a href="{{ route('admin.principles.edit', $item) }}" class="btn btn-sm btn-ghost" title="Edit">
                                    ✏️ Edit
                                </a>
                                <form action="{{ route('admin.principles.destroy', $item) }}" method="POST" class="form-delete" data-confirm="Yakin ingin menghapus prinsip '{{ $item->title }}'?">
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
                        <td colspan="4" style="text-align: center; color: #6b7280; padding: 2rem;">
                            Belum ada prinsip kerja yang ditambahkan.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    @if ($principles->hasPages())
        <div style="margin-top: 1rem;">
            {{ $principles->links() }}
        </div>
    @endif
</div>
@endsection

