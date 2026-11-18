@extends('admin.layouts.app')

@section('title', 'Bidang Keahlian')
@section('page-title', 'Manajemen Bidang Keahlian (Tab Profil)')

@section('content')
<div class="card">
    <div class="card-header">
        <h2 class="card-title">Daftar Bidang Keahlian</h2>
        <a href="{{ route('admin.expertises.create') }}" class="btn btn-warning">
            <span>+</span> Tambah Keahlian
        </a>
    </div>

    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th style="width: 70px;">Urutan</th>
                    <th>Label</th>
                    <th>Judul</th>
                    <th>Slug</th>
                    <th>Skill Terkait</th>
                    <th style="width: 140px;">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($expertises as $item)
                    <tr>
                        <td><span class="badge badge-mint">{{ $item->sort_order }}</span></td>
                        <td><strong>{{ $item->label }}</strong></td>
                        <td>{{ $item->title }}</td>
                        <td><code>{{ $item->slug }}</code></td>
                        <td>
                            <div style="display: flex; flex-wrap: wrap; gap: 0.3rem;">
                                @forelse ($item->skills as $sk)
                                    <span class="badge badge-sky">{{ $sk->name }}</span>
                                @empty
                                    <span style="color: #9ca3af; font-size: 0.8rem;">Tidak ada skill</span>
                                @endforelse
                            </div>
                        </td>
                        <td>
                            <div class="table-actions">
                                <a href="{{ route('admin.expertises.edit', $item) }}" class="btn btn-sm btn-ghost" title="Edit">
                                    ✏️ Edit
                                </a>
                                <form action="{{ route('admin.expertises.destroy', $item) }}" method="POST" class="form-delete" data-confirm="Yakin ingin menghapus bidang keahlian '{{ $item->label }}'?">
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
                        <td colspan="6" style="text-align: center; color: #6b7280; padding: 2rem;">
                            Belum ada bidang keahlian yang terdaftar.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    @if ($expertises->hasPages())
        <div style="margin-top: 1rem;">
            {{ $expertises->links() }}
        </div>
    @endif
</div>
@endsection

