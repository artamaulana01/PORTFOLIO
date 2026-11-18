<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login Administrator | Portfolio Admin</title>
    <link rel="icon" href="{{ asset('images/logo.svg') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=JetBrains+Mono:wght@400;600;700&family=Outfit:wght@500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
    <style>
        .login-wrapper {
            min-height: 100vh;
            display: grid;
            place-items: center;
            padding: 1.5rem;
            background: radial-gradient(circle at 50% 30%, #1aa6d9, #075a8a 85%);
        }
        .login-card {
            width: 100%;
            max-width: 420px;
            background: #fff;
            border: 3px solid var(--ink);
            border-radius: 16px;
            box-shadow: 8px 8px 0 var(--ink);
            padding: 2.2rem 2rem;
        }
        .login-logo {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.75rem;
            margin-bottom: 1.5rem;
        }
        .login-logo img {
            width: 50px;
            height: 50px;
            object-fit: contain;
        }
        .login-header {
            text-align: center;
            margin-bottom: 1.75rem;
        }
        .login-header h1 {
            font-size: 1.6rem;
            font-weight: 800;
            color: var(--ink);
        }
        .login-header p {
            font-size: 0.82rem;
            color: #4b5563;
            margin-top: 0.35rem;
        }
    </style>
</head>
<body>
    <div class="login-wrapper">
        <div class="login-card">
            <div class="login-logo">
                <img src="{{ asset('images/logo.svg') }}" alt="Logo">
            </div>

            <div class="login-header">
                <h1>Admin Login</h1>
                <p>Masuk untuk mengelola seluruh konten portofolio Anda.</p>
            </div>

            @if (session('success'))
                <div class="alert alert-success" style="padding: 0.7rem 1rem; font-size: 0.85rem;">
                    {{ session('success') }}
                </div>
            @endif

            @if ($errors->any())
                <div class="alert alert-error" style="padding: 0.7rem 1rem; font-size: 0.85rem;">
                    {{ $errors->first() }}
                </div>
            @endif

            <form action="{{ route('admin.login.submit') }}" method="POST">
                @csrf

                <div class="form-group">
                    <label for="email" class="form-label">Alamat Email</label>
                    <input type="email" name="email" id="email" class="form-input" value="{{ old('email') }}" required autofocus placeholder="admin@portfolio.test">
                </div>

                <div class="form-group">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" name="password" id="password" class="form-input" required placeholder="••••••••">
                </div>

                <div class="form-group" style="display: flex; align-items: center; justify-content: space-between; margin-top: 0.5rem;">
                    <label class="checkbox-label">
                        <input type="checkbox" name="remember" value="1" {{ old('remember') ? 'checked' : '' }}>
                        <span>Ingat saya di perangkat ini</span>
                    </label>
                </div>

                <div style="margin-top: 1.75rem;">
                    <button type="submit" class="btn btn-warning" style="width: 100%; padding: 0.75rem; font-size: 0.95rem;">
                        Masuk ke Dashboard →
                    </button>
                </div>
            </form>

            <div style="text-align: center; margin-top: 1.5rem; border-top: 1.5px solid #e5e7eb; padding-top: 1.25rem;">
                <a href="{{ route('home') }}" style="font-size: 0.82rem; font-weight: 700; color: #0284c7; text-decoration: underline;">
                    ← Kembali ke Halaman Utama Portofolio
                </a>
            </div>
        </div>
    </div>
</body>
</html>

