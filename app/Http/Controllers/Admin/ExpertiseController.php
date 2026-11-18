<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ExpertiseRequest;
use App\Models\Expertise;
use App\Models\Profile;
use App\Models\Skill;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class ExpertiseController extends Controller
{
    /**
     * Tampilkan daftar bidang keahlian.
     */
    public function index(): View
    {
        $expertises = Expertise::with('skills')
            ->orderBy('sort_order')
            ->paginate(15);

        return view('admin.expertises.index', compact('expertises'));
    }

    /**
     * Tampilkan form tambah bidang keahlian.
     */
    public function create(): View
    {
        $expertise = new Expertise(['sort_order' => 0]);
        $skills = Skill::with('category')->orderBy('sort_order')->get();
        $selectedSkills = [];

        return view('admin.expertises.create', compact('expertise', 'skills', 'selectedSkills'));
    }

    /**
     * Simpan data bidang keahlian baru.
     */
    public function store(ExpertiseRequest $request): RedirectResponse
    {
        $profile = Profile::firstOrFail();
        $data = $request->validated();
        $skills = $data['skills'] ?? [];
        unset($data['skills']);

        $data['profile_id'] = $profile->id;
        $expertise = Expertise::create($data);

        // Sinkronisasi relasi many-to-many ke pivot expertise_skill
        $expertise->skills()->sync($skills);

        return redirect()->route('admin.expertises.index')
            ->with('success', 'Bidang keahlian baru berhasil ditambahkan.');
    }

    /**
     * Tampilkan form edit bidang keahlian.
     */
    public function edit(Expertise $expertise): View
    {
        $skills = Skill::with('category')->orderBy('sort_order')->get();
        $selectedSkills = $expertise->skills->pluck('id')->all();

        return view('admin.expertises.edit', compact('expertise', 'skills', 'selectedSkills'));
    }

    /**
     * Perbarui data bidang keahlian.
     */
    public function update(ExpertiseRequest $request, Expertise $expertise): RedirectResponse
    {
        $data = $request->validated();
        $skills = $data['skills'] ?? [];
        unset($data['skills']);

        $expertise->update($data);
        $expertise->skills()->sync($skills);

        return redirect()->route('admin.expertises.index')
            ->with('success', 'Bidang keahlian berhasil diperbarui.');
    }

    /**
     * Hapus data bidang keahlian.
     */
    public function destroy(Expertise $expertise): RedirectResponse
    {
        $expertise->delete();

        return redirect()->route('admin.expertises.index')
            ->with('success', 'Bidang keahlian berhasil dihapus.');
    }
}

