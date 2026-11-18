<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

class AuthController extends Controller
{
    /**
     * Tampilkan form login admin.
     */
    public function showLoginForm(): View
    {
        return view('admin.auth.login');
    }

    /**
     * Proses otentikasi login admin.
     */
    public function login(LoginRequest $request): RedirectResponse
    {
        // 1. Periksa batas percobaan login (Rate Limiter)
        $request->ensureIsNotRateLimited();

        $credentials = $request->only('email', 'password');
        $remember = $request->boolean('remember');

        // 2. Lakukan percobaan login dengan guard 'admin'
        if (Auth::guard('admin')->attempt($credentials, $remember)) {
            RateLimiter::clear($request->throttleKey());

            $request->session()->regenerate();

            /** @var \App\Models\Admin $admin */
            $admin = Auth::guard('admin')->user();
            $admin->update(['last_login_at' => now()]);

            return redirect()->intended(route('admin.dashboard'))
                ->with('success', 'Selamat datang kembali, '.$admin->name.'!');
        }

        // 3. Catat percobaan gagal ke rate limiter
        RateLimiter::hit($request->throttleKey());

        throw ValidationException::withMessages([
            'email' => 'Kredensial yang diberikan tidak cocok dengan data kami.',
        ]);
    }

    /**
     * Proses logout admin.
     */
    public function logout(Request $request): RedirectResponse
    {
        Auth::guard('admin')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('admin.login')
            ->with('success', 'Anda telah berhasil keluar dari sesi admin.');
    }
}

