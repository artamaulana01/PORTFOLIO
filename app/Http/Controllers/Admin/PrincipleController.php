<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PrincipleRequest;
use App\Models\Principle;
use App\Models\Profile;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class PrincipleController extends Controller
{
    /**
     * Tampilkan daftar prinsip kerja.
     */
    public function index(): View
    {
        $principles = Principle::orderBy('sort_order')->paginate(15);

        return view('admin.principles.index', compact('principles'));
    }

    /**
     * Tampilkan form tambah prinsip kerja.
     */
    public function create(): View
    {
        $principle = new Principle(['sort_order' => 0]);

        return view('admin.principles.create', compact('principle'));
    }

    /**
     * Simpan prinsip kerja baru.
     */
    public function store(PrincipleRequest $request): RedirectResponse
    {
        $profile = Profile::firstOrFail();
        $data = $request->validated();
        $data['profile_id'] = $profile->id;

        Principle::create($data);

        return redirect()->route('admin.principles.index')
            ->with('success', 'Prinsip kerja baru berhasil ditambahkan.');
    }

    /**
     * Tampilkan form edit prinsip kerja.
     */
    public function edit(Principle $principle): View
    {
        return view('admin.principles.edit', compact('principle'));
    }

    /**
     * Perbarui data prinsip kerja.
     */
    public function update(PrincipleRequest $request, Principle $principle): RedirectResponse
    {
        $principle->update($request->validated());

        return redirect()->route('admin.principles.index')
            ->with('success', 'Prinsip kerja berhasil diperbarui.');
    }

    /**
     * Hapus prinsip kerja.
     */
    public function destroy(Principle $principle): RedirectResponse
    {
        $principle->delete();

        return redirect()->route('admin.principles.index')
            ->with('success', 'Prinsip kerja berhasil dihapus.');
    }
}

