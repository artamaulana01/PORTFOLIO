<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Admin Dashboard') | Portfolio Admin</title>
    <link rel="icon" href="{{ asset('images/logo.svg') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=JetBrains+Mono:wght@400;600;700&family=Outfit:wght@500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
    @stack('styles')
</head>
<body>
    <div class="admin-layout">
        <!-- Overlay untuk layar mobile -->
        <div class="sidebar-overlay" id="sidebarOverlay"></div>

        <!-- Sidebar Kiri -->
        <aside class="admin-sidebar" id="adminSidebar">
            <div class="sidebar-header">
                <img src="{{ asset('images/logo.svg') }}" alt="Logo">
                <div>
                    <div class="brand-title">Admin Panel</div>
                    <div class="brand-sub">Portfolio CMS</div>
                </div>
            </div>

            <nav class="sidebar-menu">
                <div class="menu-section">Utama</div>
                <a href="{{ route('admin.dashboard') }}" class="nav-item {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                    <span>📊</span> Dashboard
                </a>
                <a href="{{ route('admin.profile.edit') }}" class="nav-item {{ request()->routeIs('admin.profile.*') ? 'active' : '' }}">
                    <span>👤</span> Data Diri Profil
                </a>

                <div class="menu-section">Keahlian & Skill</div>
                <a href="{{ route('admin.expertises.index') }}" class="nav-item {{ request()->routeIs('admin.expertises.*') ? 'active' : '' }}">
                    <span>🎯</span> Bidang Keahlian
                </a>
                <a href="{{ route('admin.principles.index') }}" class="nav-item {{ request()->routeIs('admin.principles.*') ? 'active' : '' }}">
                    <span>🧭</span> Prinsip Kerja
                </a>
                <a href="{{ route('admin.skill-categories.index') }}" class="nav-item {{ request()->routeIs('admin.skill-categories.*') ? 'active' : '' }}">
                    <span>📂</span> Kategori Skill
                </a>
                <a href="{{ route('admin.skills.index') }}" class="nav-item {{ request()->routeIs('admin.skills.*') ? 'active' : '' }}">
                    <span>⚡</span> Daftar Skill
                </a>

                <div class="menu-section">Proyek & Portofolio</div>
                <a href="{{ route('admin.project-categories.index') }}" class="nav-item {{ request()->routeIs('admin.project-categories.*') ? 'active' : '' }}">
                    <span>🏷️</span> Kategori Proyek
                </a>
                <a href="{{ route('admin.projects.index') }}" class="nav-item {{ request()->routeIs('admin.projects.*') ? 'active' : '' }}">
                    <span>🚀</span> Proyek / Portofolio
                </a>

                <div class="menu-section">Riwayat & Kontak</div>
                <a href="{{ route('admin.milestone-types.index') }}" class="nav-item {{ request()->routeIs('admin.milestone-types.*') ? 'active' : '' }}">
                    <span>📑</span> Tipe Milestone
                </a>
                <a href="{{ route('admin.milestones.index') }}" class="nav-item {{ request()->routeIs('admin.milestones.*') ? 'active' : '' }}">
                    <span>🎓</span> Riwayat & Milestone
                </a>
                <a href="{{ route('admin.contact-topics.index') }}" class="nav-item {{ request()->routeIs('admin.contact-topics.*') ? 'active' : '' }}">
                    <span>💬</span> Topik Kontak
                </a>
            </nav>

            <div class="sidebar-footer">
                <div class="admin-badge">
                    <div class="admin-avatar-circle">
                        {{ strtoupper(substr(Auth::guard('admin')->user()->name ?? 'A', 0, 1)) }}
                    </div>
                    <div>
                        <div class="admin-info-name">{{ Auth::guard('admin')->user()->name ?? 'Admin' }}</div>
                        <div class="admin-info-email">{{ Auth::guard('admin')->user()->email ?? '' }}</div>
                    </div>
                </div>
            </div>
        </aside>

        <!-- Area Konten Utama -->
        <div class="admin-main">
            <!-- Topbar Sticky -->
            <header class="admin-topbar">
                <div class="topbar-left">
                    <button class="hamburger-btn" id="hamburgerBtn" type="button" aria-label="Toggle menu">☰</button>
                    <h1 class="page-title">@yield('page-title', 'Dashboard')</h1>
                </div>

                <div class="topbar-right">
                    <a href="{{ route('home') }}" target="_blank" class="btn btn-sm btn-ghost" title="Buka website publik di tab baru">
                        <span>🌐</span> Lihat Website ↗
                    </a>
                    <a href="{{ route('admin.password.edit') }}" class="btn btn-sm btn-ghost" title="Ubah Password">
                        <span>🔒</span> Ubah Password
                    </a>
                    <form action="{{ route('admin.logout') }}" method="POST" style="display: inline;">
                        @csrf
                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin ingin logout?');">
                            <span>🚪</span> Logout
                        </button>
                    </form>
                </div>
            </header>

            <!-- Main Content Container -->
            <main class="admin-content">
                <!-- Flash Messages -->
                @if (session('success'))
                    <div class="alert alert-success">
                        <span>✓ {{ session('success') }}</span>
                    </div>
                @endif

                @if (session('error'))
                    <div class="alert alert-error">
                        <span>⚠️ {{ session('error') }}</span>
                    </div>
                @endif

                @if ($errors->any())
                    <div class="alert alert-error">
                        <div>
                            <strong>Terdapat kesalahan pada isian form:</strong>
                            <ul style="margin-top: 0.35rem; padding-left: 1.25rem;">
                                @foreach ($errors->all() as $err)
                                    <li>{{ $err }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                @endif

                @yield('content')
            </main>
        </div>
    </div>

    <script src="{{ asset('js/admin.js') }}"></script>
    @stack('scripts')
</body>
</html>

