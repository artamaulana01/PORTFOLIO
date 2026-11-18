<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ProjectCategoryRequest;
use App\Models\ProjectCategory;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class ProjectCategoryController extends Controller
{
    /**
     * Tampilkan daftar kategori proyek.
     */
    public function index(): View
    {
        $categories = ProjectCategory::withCount('projects')->paginate(15);

        return view('admin.project-categories.index', compact('categories'));
    }

    /**
     * Tampilkan form tambah kategori proyek.
     */
    public function create(): View
    {
        $category = new ProjectCategory();

        return view('admin.project-categories.create', compact('category'));
    }

    /**
     * Simpan kategori proyek baru.
     */
    public function store(ProjectCategoryRequest $request): RedirectResponse
    {
        ProjectCategory::create($request->validated());

        return redirect()->route('admin.project-categories.index')
            ->with('success', 'Kategori proyek baru berhasil ditambahkan.');
    }

    /**
     * Tampilkan form edit kategori proyek.
     */
    public function edit(ProjectCategory $projectCategory): View
    {
        return view('admin.project-categories.edit', ['category' => $projectCategory]);
    }

    /**
     * Perbarui data kategori proyek.
     */
    public function update(ProjectCategoryRequest $request, ProjectCategory $projectCategory): RedirectResponse
    {
        $projectCategory->update($request->validated());

        return redirect()->route('admin.project-categories.index')
            ->with('success', 'Kategori proyek berhasil diperbarui.');
    }

    /**
     * Hapus kategori proyek dengan proteksi FK.
     */
    public function destroy(ProjectCategory $projectCategory): RedirectResponse
    {
        // Proteksi agar tidak memicu error restrictOnDelete database
        if ($projectCategory->projects()->exists()) {
            return redirect()->route('admin.project-categories.index')
                ->with('error', 'Kategori proyek "'.$projectCategory->name.'" tidak dapat dihapus karena masih digunakan oleh proyek yang ada.');
        }

        $projectCategory->delete();

        return redirect()->route('admin.project-categories.index')
            ->with('success', 'Kategori proyek berhasil dihapus.');
    }
}

