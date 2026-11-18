<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\SkillRequest;
use App\Models\Skill;
use App\Models\SkillCategory;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class SkillController extends Controller
{
    /**
     * Tampilkan daftar skill.
     */
    public function index(): View
    {
        $skills = Skill::with('category')
            ->orderBy('sort_order')
            ->paginate(20);

        return view('admin.skills.index', compact('skills'));
    }

    /**
     * Tampilkan form tambah skill.
     */
    public function create(): View
    {
        $skill = new Skill(['sort_order' => 0]);
        $categories = SkillCategory::orderBy('sort_order')->get();

        return view('admin.skills.create', compact('skill', 'categories'));
    }

    /**
     * Simpan skill baru.
     */
    public function store(SkillRequest $request): RedirectResponse
    {
        Skill::create($request->validated());

        return redirect()->route('admin.skills.index')
            ->with('success', 'Skill baru berhasil ditambahkan.');
    }

    /**
     * Tampilkan form edit skill.
     */
    public function edit(Skill $skill): View
    {
        $categories = SkillCategory::orderBy('sort_order')->get();

        return view('admin.skills.edit', compact('skill', 'categories'));
    }

    /**
     * Perbarui data skill.
     */
    public function update(SkillRequest $request, Skill $skill): RedirectResponse
    {
        $skill->update($request->validated());

        return redirect()->route('admin.skills.index')
            ->with('success', 'Data skill berhasil diperbarui.');
    }

    /**
     * Hapus skill.
     */
    public function destroy(Skill $skill): RedirectResponse
    {
        $skill->delete();

        return redirect()->route('admin.skills.index')
            ->with('success', 'Skill berhasil dihapus.');
    }
}

