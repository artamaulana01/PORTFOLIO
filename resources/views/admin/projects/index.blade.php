@extends('admin.layouts.app')

@section('title', 'Data Proyek')
@section('page-title', 'Manajemen Proyek Portofolio & Studi Kasus')

@section('content')
<div class="card">
    <div class="card-header">
        <h2 class="card-title">Daftar Proyek</h2>
        <a href="{{ route('admin.projects.create') }}" class="btn btn-warning">
            <span>+</span> Tambah Proyek Baru
        </a>
    </div>

    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th style="width: 60px;">Urutan</th>
                    <th>Gambar / Warna</th>
                    <th>Judul Proyek</th>
                    <th>Kategori</th>
                    <th>Subjudul</th>
                    <th>Skill Terkait</th>
                    <th style="width: 140px;">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($projects as $item)
                    <tr>
                        <td><span class="badge badge-mint">{{ $item->sort_order }}</span></td>
                        <td>
                            @if ($item->image_path)
                                <img src="{{ asset($item->image_path) }}" alt="{{ $item->title }}" style="width: 55px; height: 35px; border-radius: 6px; border: 1.5px solid var(--ink); object-fit: cover;">
                            @else
                                <div style="width: 55px; height: 35px; border-radius: 6px; border: 1.5px solid var(--ink); background: {{ $item->color }}; display: grid; place-items: center; color: #fff; font-size: 0.65rem; font-weight: 800;">
                                    Teks
                                </div>
                            @endif
                        </td>
                        <td>
                            <strong>{{ $item->title }}</strong>
                            <div style="font-size: 0.72rem; color: #6b7280; font-family: var(--font-mono);">
                                {{ $item->slug }}
                            </div>
                        </td>
                        <td><span class="badge badge-yel">{{ $item->category->name ?? '-' }}</span></td>
                        <td style="max-width: 260px; font-size: 0.82rem; color: #4b5563;">
                            {{ $item->subtitle }}
                        </td>
                        <td>
                            <div style="display: flex; flex-wrap: wrap; gap: 0.25rem; max-width: 220px;">
                                @forelse ($item->skills as $sk)
                                    <span class="badge badge-sky">{{ $sk->name }}</span>
                                @empty
                                    <span style="color: #9ca3af; font-size: 0.75rem;">-</span>
                                @endforelse
                            </div>
                        </td>
                        <td>
                            <div class="table-actions">
                                <a href="{{ route('admin.projects.edit', $item) }}" class="btn btn-sm btn-ghost" title="Edit">
                                    ✏️ Edit
                                </a>
                                <form action="{{ route('admin.projects.destroy', $item) }}" method="POST" class="form-delete" data-confirm="Yakin ingin menghapus proyek '{{ $item->title }}'? Seluruh data informasi dan poin terkait juga akan dihapus.">
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
                        <td colspan="7" style="text-align: center; color: #6b7280; padding: 2rem;">
                            Belum ada proyek yang ditambahkan.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    @if ($projects->hasPages())
        <div style="margin-top: 1rem;">
            {{ $projects->links() }}
        </div>
    @endif
</div>
@endsection

