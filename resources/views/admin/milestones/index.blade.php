@extends('admin.layouts.app')

@section('title', 'Data Milestone')
@section('page-title', 'Manajemen Riwayat & Milestone Portofolio')

@section('content')
<div class="card">
    <div class="card-header">
        <h2 class="card-title">Daftar Milestone</h2>
        <a href="{{ route('admin.milestones.create') }}" class="btn btn-warning">
            <span>+</span> Tambah Milestone
        </a>
    </div>

    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th style="width: 70px;">Urutan</th>
                    <th>Judul Milestone</th>
                    <th>Tipe</th>
                    <th>Tempat / Instansi</th>
                    <th>Periode</th>
                    <th>Tag Keterampilan</th>
                    <th style="width: 140px;">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($milestones as $item)
                    <tr>
                        <td><span class="badge badge-mint">{{ $item->sort_order }}</span></td>
                        <td><strong>{{ $item->title }}</strong></td>
                        <td><span class="badge badge-yel">{{ $item->type->name ?? '-' }}</span></td>
                        <td>{{ $item->place }}</td>
                        <td><span class="badge badge-sky">{{ $item->period }}</span></td>
                        <td>
                            <div style="display: flex; flex-wrap: wrap; gap: 0.25rem; max-width: 200px;">
                                @forelse ($item->tags as $tg)
                                    <span class="badge" style="background: #e0f2fe;">{{ $tg->name }}</span>
                                @empty
                                    <span style="color: #9ca3af; font-size: 0.75rem;">-</span>
                                @endforelse
                            </div>
                        </td>
                        <td>
                            <div class="table-actions">
                                <a href="{{ route('admin.milestones.edit', $item) }}" class="btn btn-sm btn-ghost" title="Edit">
                                    ✏️ Edit
                                </a>
                                <form action="{{ route('admin.milestones.destroy', $item) }}" method="POST" class="form-delete" data-confirm="Yakin ingin menghapus milestone '{{ $item->title }}'?">
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
                            Belum ada riwayat milestone yang ditambahkan.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    @if ($milestones->hasPages())
        <div style="margin-top: 1rem;">
            {{ $milestones->links() }}
        </div>
    @endif
</div>
@endsection

