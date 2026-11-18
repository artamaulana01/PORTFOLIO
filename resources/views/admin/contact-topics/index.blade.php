@extends('admin.layouts.app')

@section('title', 'Topik Kontak')
@section('page-title', 'Manajemen Topik Diskusi Kontak')

@section('content')
<div class="card" style="max-width: 700px;">
    <div class="card-header">
        <h2 class="card-title">Daftar Topik Diskusi Kontak</h2>
        <a href="{{ route('admin.contact-topics.create') }}" class="btn btn-warning">
            <span>+</span> Tambah Topik
        </a>
    </div>

    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th style="width: 70px;">Urutan</th>
                    <th>Label Topik</th>
                    <th style="width: 140px;">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($topics as $item)
                    <tr>
                        <td><span class="badge badge-mint">{{ $item->sort_order }}</span></td>
                        <td><strong>{{ $item->label }}</strong></td>
                        <td>
                            <div class="table-actions">
                                <a href="{{ route('admin.contact-topics.edit', $item) }}" class="btn btn-sm btn-ghost" title="Edit">
                                    ✏️ Edit
                                </a>
                                <form action="{{ route('admin.contact-topics.destroy', $item) }}" method="POST" class="form-delete" data-confirm="Yakin ingin menghapus topik '{{ $item->label }}'?">
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
                            Belum ada topik diskusi kontak.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    @if ($topics->hasPages())
        <div style="margin-top: 1rem;">
            {{ $topics->links() }}
        </div>
    @endif
</div>
@endsection

