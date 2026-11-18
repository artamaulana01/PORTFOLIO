<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\UpdatePasswordRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;

class PasswordController extends Controller
{
    /**
     * Tampilkan form ubah password admin.
     */
    public function edit(): View
    {
        return view('admin.password.edit', [
            'admin' => Auth::guard('admin')->user(),
        ]);
    }

    /**
     * Simpan password baru.
     */
    public function update(UpdatePasswordRequest $request): RedirectResponse
    {
        /** @var \App\Models\Admin $admin */
        $admin = Auth::guard('admin')->user();

        $admin->update([
            'password' => Hash::make($request->validated()['password']),
        ]);

        return redirect()->route('admin.password.edit')
            ->with('success', 'Password administrator berhasil diperbarui.');
    }
}

