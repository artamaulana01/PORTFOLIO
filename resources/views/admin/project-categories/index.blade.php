@extends('admin.layouts.app')

@section('title', 'Kategori Proyek')
@section('page-title', 'Manajemen Kategori Proyek')

@section('content')
<div class="card" style="max-width: 800px;">
    <div class="card-header">
        <h2 class="card-title">Daftar Kategori Proyek</h2>
        <a href="{{ route('admin.project-categories.create') }}" class="btn btn-warning">
            <span>+</span> Tambah Kategori
        </a>
    </div>

    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th>Nama Kategori</th>
                    <th>Slug</th>
                    <th>Jumlah Proyek</th>
                    <th style="width: 140px;">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($categories as $cat)
                    <tr>
                        <td><strong>{{ $cat->name }}</strong></td>
                        <td><code>{{ $cat->slug }}</code></td>
                        <td>
                            <a href="{{ route('admin.projects.index') }}" style="font-weight: 700; color: #0284c7; text-decoration: underline;">
                                {{ $cat->projects_count }} proyek
                            </a>
                        </td>
                        <td>
                            <div class="table-actions">
                                <a href="{{ route('admin.project-categories.edit', $cat) }}" class="btn btn-sm btn-ghost" title="Edit">
                                    ✏️ Edit
                                </a>
                                <form action="{{ route('admin.project-categories.destroy', $cat) }}" method="POST" class="form-delete" data-confirm="Yakin ingin menghapus kategori '{{ $cat->name }}'?">
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
                            Belum ada kategori proyek.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    @if ($categories->hasPages())
        <div style="margin-top: 1rem;">
            {{ $categories->links() }}
        </div>
    @endif
</div>
@endsection

