@extends('admin.layouts.app')

@section('title', 'Daftar Skill')
@section('page-title', 'Manajemen Skill & Teknologi')

@section('content')
<div class="card">
    <div class="card-header">
        <h2 class="card-title">Daftar Skill & Tools</h2>
        <a href="{{ route('admin.skills.create') }}" class="btn btn-warning">
            <span>+</span> Tambah Skill
        </a>
    </div>

    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th style="width: 70px;">Urutan</th>
                    <th>Nama Skill</th>
                    <th>Kategori</th>
                    <th>Catatan</th>
                    <th style="width: 140px;">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($skills as $item)
                    <tr>
                        <td><span class="badge badge-mint">{{ $item->sort_order }}</span></td>
                        <td><strong>{{ $item->name }}</strong></td>
                        <td><span class="badge badge-yel">{{ $item->category->name ?? '-' }}</span></td>
                        <td><span style="color: #4b5563; font-size: 0.85rem;">{{ $item->note ?? '-' }}</span></td>
                        <td>
                            <div class="table-actions">
                                <a href="{{ route('admin.skills.edit', $item) }}" class="btn btn-sm btn-ghost" title="Edit">
                                    ✏️ Edit
                                </a>
                                <form action="{{ route('admin.skills.destroy', $item) }}" method="POST" class="form-delete" data-confirm="Yakin ingin menghapus skill '{{ $item->name }}'?">
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
                        <td colspan="5" style="text-align: center; color: #6b7280; padding: 2rem;">
                            Belum ada skill yang ditambahkan.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    @if ($skills->hasPages())
        <div style="margin-top: 1rem;">
            {{ $skills->links() }}
        </div>
    @endif
</div>
@endsection

