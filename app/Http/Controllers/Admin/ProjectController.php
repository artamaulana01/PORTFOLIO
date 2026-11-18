<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\Concerns\HandlesUploads;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ProjectRequest;
use App\Models\Profile;
use App\Models\Project;
use App\Models\ProjectCategory;
use App\Models\Skill;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class ProjectController extends Controller
{
    use HandlesUploads;

    /**
     * Tampilkan daftar proyek.
     */
    public function index(): View
    {
        $projects = Project::with(['category', 'skills'])
            ->orderBy('sort_order')
            ->paginate(15);

        return view('admin.projects.index', compact('projects'));
    }

    /**
     * Tampilkan form tambah proyek baru.
     */
    public function create(): View
    {
        $project = new Project([
            'color' => '#0e86c4',
            'sort_order' => 0,
        ]);
        $categories = ProjectCategory::all();
        $skills = Skill::with('category')->orderBy('sort_order')->get();
        $selectedSkills = [];

        return view('admin.projects.create', compact('project', 'categories', 'skills', 'selectedSkills'));
    }

    /**
     * Simpan data proyek baru beserta gambar, skill, infos, dan points dalam satu transaksi DB.
     */
    public function store(ProjectRequest $request): RedirectResponse
    {
        $profile = Profile::firstOrFail();
        $validated = $request->validated();

        $skills = $validated['skills'] ?? [];
        $infos = $validated['infos'] ?? [];
        $points = $validated['points'] ?? [];
        unset($validated['skills'], $validated['infos'], $validated['points']);

        // Tangani upload gambar proyek
        if ($request->hasFile('image')) {
            $validated['image_path'] = $this->uploadFile($request->file('image'), 'projects');
        }
        unset($validated['image']);

        $validated['profile_id'] = $profile->id;

        DB::transaction(function () use ($validated, $skills, $infos, $points) {
            $project = Project::create($validated);

            // 1. Sinkronisasi relasi many-to-many skill
            $project->skills()->sync($skills);

            // 2. Simpan baris dinamis project_infos (metadata)
            $sortInfo = 0;
            foreach ($infos as $info) {
                if (! empty($info['label']) && ! empty($info['value'])) {
                    $project->infos()->create([
                        'label' => $info['label'],
                        'value' => $info['value'],
                        'sort_order' => $sortInfo++,
                    ]);
                }
            }

            // 3. Simpan baris dinamis project_points (arsitektur/fitur)
            $sortPoint = 0;
            foreach ($points as $point) {
                if (! empty($point['body'])) {
                    $project->points()->create([
                        'body' => $point['body'],
                        'sort_order' => $sortPoint++,
                    ]);
                }
            }
        });

        return redirect()->route('admin.projects.index')
            ->with('success', 'Proyek baru berhasil ditambahkan.');
    }

    /**
     * Tampilkan form edit proyek.
     */
    public function edit(Project $project): View
    {
        $project->load(['infos', 'points', 'skills']);
        $categories = ProjectCategory::all();
        $skills = Skill::with('category')->orderBy('sort_order')->get();
        $selectedSkills = $project->skills->pluck('id')->all();

        return view('admin.projects.edit', compact('project', 'categories', 'skills', 'selectedSkills'));
    }

    /**
     * Perbarui data proyek beserta relasinya dalam satu transaksi DB.
     */
    public function update(ProjectRequest $request, Project $project): RedirectResponse
    {
        $validated = $request->validated();

        $skills = $validated['skills'] ?? [];
        $infos = $validated['infos'] ?? [];
        $points = $validated['points'] ?? [];
        unset($validated['skills'], $validated['infos'], $validated['points']);

        if ($request->hasFile('image')) {
            $validated['image_path'] = $this->uploadFile(
                $request->file('image'),
                'projects',
                $project->image_path
            );
        }
        unset($validated['image']);

        DB::transaction(function () use ($project, $validated, $skills, $infos, $points) {
            $project->update($validated);

            // 1. Sinkronisasi relasi many-to-many skill
            $project->skills()->sync($skills);

            // 2. Perbarui baris dinamis project_infos
            $project->infos()->delete();
            $sortInfo = 0;
            foreach ($infos as $info) {
                if (! empty($info['label']) && ! empty($info['value'])) {
                    $project->infos()->create([
                        'label' => $info['label'],
                        'value' => $info['value'],
                        'sort_order' => $sortInfo++,
                    ]);
                }
            }

            // 3. Perbarui baris dinamis project_points
            $project->points()->delete();
            $sortPoint = 0;
            foreach ($points as $point) {
                if (! empty($point['body'])) {
                    $project->points()->create([
                        'body' => $point['body'],
                        'sort_order' => $sortPoint++,
                    ]);
                }
            }
        });

        return redirect()->route('admin.projects.index')
            ->with('success', 'Data proyek berhasil diperbarui.');
    }

    /**
     * Hapus data proyek beserta berkas gambar dan relasi terkait.
     */
    public function destroy(Project $project): RedirectResponse
    {
        // Hapus file fisik gambar jika ada di uploads/
        $this->deleteFile($project->image_path);

        $project->delete();

        return redirect()->route('admin.projects.index')
            ->with('success', 'Proyek berhasil dihapus.');
    }
}

