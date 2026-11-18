<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\MilestoneRequest;
use App\Models\Milestone;
use App\Models\MilestoneType;
use App\Models\Profile;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class MilestoneController extends Controller
{
    /**
     * Tampilkan daftar milestone (pendidikan, organisasi, pencapaian, dsb).
     */
    public function index(): View
    {
        $milestones = Milestone::with(['type', 'points', 'tags'])
            ->orderBy('sort_order')
            ->paginate(15);

        return view('admin.milestones.index', compact('milestones'));
    }

    /**
     * Tampilkan form tambah milestone baru.
     */
    public function create(): View
    {
        $milestone = new Milestone(['sort_order' => 0]);
        $types = MilestoneType::all();

        return view('admin.milestones.create', compact('milestone', 'types'));
    }

    /**
     * Simpan data milestone baru beserta poin dan tag dalam satu transaksi DB.
     */
    public function store(MilestoneRequest $request): RedirectResponse
    {
        $profile = Profile::firstOrFail();
        $validated = $request->validated();

        $points = $validated['points'] ?? [];
        $tags = $validated['tags'] ?? [];
        unset($validated['points'], $validated['tags']);

        $validated['profile_id'] = $profile->id;

        DB::transaction(function () use ($validated, $points, $tags) {
            $milestone = Milestone::create($validated);

            // 1. Simpan baris dinamis milestone_points
            $sortPoint = 0;
            foreach ($points as $p) {
                if (! empty($p['body'])) {
                    $milestone->points()->create([
                        'body' => $p['body'],
                        'sort_order' => $sortPoint++,
                    ]);
                }
            }

            // 2. Simpan baris dinamis milestone_tags
            foreach ($tags as $tag) {
                if (! empty($tag)) {
                    $milestone->tags()->create([
                        'name' => trim($tag),
                    ]);
                }
            }
        });

        return redirect()->route('admin.milestones.index')
            ->with('success', 'Data milestone baru berhasil ditambahkan.');
    }

    /**
     * Tampilkan form edit milestone.
     */
    public function edit(Milestone $milestone): View
    {
        $milestone->load(['points', 'tags']);
        $types = MilestoneType::all();

        return view('admin.milestones.edit', compact('milestone', 'types'));
    }

    /**
     * Perbarui data milestone beserta poin dan tag dalam satu transaksi DB.
     */
    public function update(MilestoneRequest $request, Milestone $milestone): RedirectResponse
    {
        $validated = $request->validated();

        $points = $validated['points'] ?? [];
        $tags = $validated['tags'] ?? [];
        unset($validated['points'], $validated['tags']);

        DB::transaction(function () use ($milestone, $validated, $points, $tags) {
            $milestone->update($validated);

            // 1. Perbarui baris dinamis milestone_points
            $milestone->points()->delete();
            $sortPoint = 0;
            foreach ($points as $p) {
                if (! empty($p['body'])) {
                    $milestone->points()->create([
                        'body' => $p['body'],
                        'sort_order' => $sortPoint++,
                    ]);
                }
            }

            // 2. Perbarui baris dinamis milestone_tags
            $milestone->tags()->delete();
            foreach ($tags as $tag) {
                if (! empty($tag)) {
                    $milestone->tags()->create([
                        'name' => trim($tag),
                    ]);
                }
            }
        });

        return redirect()->route('admin.milestones.index')
            ->with('success', 'Data milestone berhasil diperbarui.');
    }

    /**
     * Hapus milestone.
     */
    public function destroy(Milestone $milestone): RedirectResponse
    {
        $milestone->delete();

        return redirect()->route('admin.milestones.index')
            ->with('success', 'Milestone berhasil dihapus.');
    }
}

