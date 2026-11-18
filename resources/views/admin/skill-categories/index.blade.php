@extends('admin.layouts.app')

@section('title', 'Kategori Skill')
@section('page-title', 'Manajemen Kategori Skill & Tools')

@section('content')
<div class="card">
    <div class="card-header">
        <h2 class="card-title">Daftar Kategori Skill</h2>
        <a href="{{ route('admin.skill-categories.create') }}" class="btn btn-warning">
            <span>+</span> Tambah Kategori
        </a>
    </div>

    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th style="width: 70px;">Urutan</th>
                    <th>Nama Kategori</th>
                    <th>Nama Pendek</th>
                    <th>Layer</th>
                    <th>Slug</th>
                    <th>Jumlah Skill</th>
                    <th style="width: 140px;">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($categories as $cat)
                    <tr>
                        <td><span class="badge badge-mint">{{ $cat->sort_order }}</span></td>
                        <td><strong>{{ $cat->name }}</strong></td>
                        <td>{{ $cat->short_name }}</td>
                        <td><span class="badge badge-sky">{{ $cat->layer }}</span></td>
                        <td><code>{{ $cat->slug }}</code></td>
                        <td>
                            <a href="{{ route('admin.skills.index') }}" style="font-weight: 700; color: #0284c7; text-decoration: underline;">
                                {{ $cat->skills_count }} skill
                            </a>
                        </td>
                        <td>
                            <div class="table-actions">
                                <a href="{{ route('admin.skill-categories.edit', $cat) }}" class="btn btn-sm btn-ghost" title="Edit">
                                    ✏️ Edit
                                </a>
                                <form action="{{ route('admin.skill-categories.destroy', $cat) }}" method="POST" class="form-delete" data-confirm="Yakin ingin menghapus kategori '{{ $cat->name }}'?">
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
                            Belum ada kategori skill.
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

