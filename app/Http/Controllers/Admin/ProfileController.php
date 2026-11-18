<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\Concerns\HandlesUploads;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\UpdateProfileRequest;
use App\Models\Profile;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class ProfileController extends Controller
{
    use HandlesUploads;

    /**
     * Tampilkan form edit data profil tunggal.
     */
    public function edit(): View
    {
        $profile = Profile::firstOrFail();

        return view('admin.profile.edit', compact('profile'));
    }

    /**
     * Simpan pembaruan data profil beserta berkas foto dan CV.
     */
    public function update(UpdateProfileRequest $request): RedirectResponse
    {
        $profile = Profile::firstOrFail();
        $validated = $request->validated();

        // 1. Tangani upload foto profil baru jika ada
        if ($request->hasFile('photo')) {
            $validated['photo_path'] = $this->uploadFile(
                $request->file('photo'),
                'profile',
                $profile->photo_path
            );
        }

        // 2. Tangani upload berkas CV PDF baru jika ada
        if ($request->hasFile('cv')) {
            $validated['cv_path'] = $this->uploadFile(
                $request->file('cv'),
                'cv',
                $profile->cv_path
            );
        }

        unset($validated['photo'], $validated['cv']);

        // 3. Simpan pembaruan data profil
        $profile->update($validated);

        return redirect()->route('admin.profile.edit')
            ->with('success', 'Data profil portofolio berhasil diperbarui.');
    }
}

