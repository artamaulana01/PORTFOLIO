<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\MilestoneTypeRequest;
use App\Models\MilestoneType;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class MilestoneTypeController extends Controller
{
    /**
     * Tampilkan daftar tipe milestone.
     */
    public function index(): View
    {
        $types = MilestoneType::withCount('milestones')->paginate(15);

        return view('admin.milestone-types.index', compact('types'));
    }

    /**
     * Tampilkan form tambah tipe milestone.
     */
    public function create(): View
    {
        $type = new MilestoneType();

        return view('admin.milestone-types.create', compact('type'));
    }

    /**
     * Simpan tipe milestone baru.
     */
    public function store(MilestoneTypeRequest $request): RedirectResponse
    {
        MilestoneType::create($request->validated());

        return redirect()->route('admin.milestone-types.index')
            ->with('success', 'Tipe milestone baru berhasil ditambahkan.');
    }

    /**
     * Tampilkan form edit tipe milestone.
     */
    public function edit(MilestoneType $milestoneType): View
    {
        return view('admin.milestone-types.edit', ['type' => $milestoneType]);
    }

    /**
     * Perbarui data tipe milestone.
     */
    public function update(MilestoneTypeRequest $request, MilestoneType $milestoneType): RedirectResponse
    {
        $milestoneType->update($request->validated());

        return redirect()->route('admin.milestone-types.index')
            ->with('success', 'Tipe milestone berhasil diperbarui.');
    }

    /**
     * Hapus tipe milestone dengan proteksi FK.
     */
    public function destroy(MilestoneType $milestoneType): RedirectResponse
    {
        if ($milestoneType->milestones()->exists()) {
            return redirect()->route('admin.milestone-types.index')
                ->with('error', 'Tipe milestone "'.$milestoneType->name.'" tidak dapat dihapus karena masih digunakan oleh data milestone.');
        }

        $milestoneType->delete();

        return redirect()->route('admin.milestone-types.index')
            ->with('success', 'Tipe milestone berhasil dihapus.');
    }
}

