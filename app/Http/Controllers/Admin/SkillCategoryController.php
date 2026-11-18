<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\SkillCategoryRequest;
use App\Models\SkillCategory;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class SkillCategoryController extends Controller
{
    /**
     * Tampilkan daftar kategori skill.
     */
    public function index(): View
    {
        $categories = SkillCategory::withCount('skills')
            ->orderBy('sort_order')
            ->paginate(15);

        return view('admin.skill-categories.index', compact('categories'));
    }

    /**
     * Tampilkan form tambah kategori skill.
     */
    public function create(): View
    {
        $category = new SkillCategory(['sort_order' => 0]);

        return view('admin.skill-categories.create', compact('category'));
    }

    /**
     * Simpan kategori skill baru.
     */
    public function store(SkillCategoryRequest $request): RedirectResponse
    {
        SkillCategory::create($request->validated());

        return redirect()->route('admin.skill-categories.index')
            ->with('success', 'Kategori skill baru berhasil ditambahkan.');
    }

    /**
     * Tampilkan form edit kategori skill.
     */
    public function edit(SkillCategory $skillCategory): View
    {
        return view('admin.skill-categories.edit', ['category' => $skillCategory]);
    }

    /**
     * Perbarui data kategori skill.
     */
    public function update(SkillCategoryRequest $request, SkillCategory $skillCategory): RedirectResponse
    {
        $skillCategory->update($request->validated());

        return redirect()->route('admin.skill-categories.index')
            ->with('success', 'Kategori skill berhasil diperbarui.');
    }

    /**
     * Hapus kategori skill.
     */
    public function destroy(SkillCategory $skillCategory): RedirectResponse
    {
        if ($skillCategory->skills()->exists()) {
            return redirect()->route('admin.skill-categories.index')
                ->with('error', 'Kategori skill tidak dapat dihapus karena masih memuat data skill.');
        }

        $skillCategory->delete();

        return redirect()->route('admin.skill-categories.index')
            ->with('success', 'Kategori skill berhasil dihapus.');
    }
}

