@extends('admin.layouts.app')

@section('title', 'Dashboard')
@section('page-title', 'Dashboard Ringkasan')

@section('content')
<div class="card" style="background: linear-gradient(135deg, #fef9c3 0%, #fff 60%); margin-bottom: 2rem;">
    <div style="display: flex; flex-wrap: wrap; justify-content: space-between; align-items: center; gap: 1rem;">
        <div>
            <h2 style="font-size: 1.45rem; font-weight: 800;">
                Halo, {{ $admin->name }}! 👋
            </h2>
            <p style="font-size: 0.88rem; color: #4b5563; margin-top: 0.25rem;">
                Login terakhir: 
                <span class="badge badge-sky">
                    {{ $admin->last_login_at ? $admin->last_login_at->translatedFormat('l, d F Y - H:i') . ' WIB' : 'Sesi Pertama Kali' }}
                </span>
            </p>
        </div>
        <div style="display: flex; gap: 0.6rem;">
            <a href="{{ route('home') }}" target="_blank" class="btn btn-warning">
                <span>🌐</span> Buka Website Publik ↗
            </a>
            <a href="{{ route('admin.profile.edit') }}" class="btn btn-ghost">
                <span>👤</span> Edit Data Diri
            </a>
        </div>
    </div>
</div>

<!-- Kartu Statistik Utama -->
<h3 style="font-size: 1.1rem; font-weight: 800; margin-bottom: 1rem;">Statistik Konten Portofolio</h3>
<div class="stats-grid">
    <div class="stat-card">
        <div>
            <div class="stat-val">{{ $stats['projects'] }}</div>
            <div class="stat-lbl">Total Proyek</div>
        </div>
        <div class="stat-icon">🚀</div>
    </div>

    <div class="stat-card">
        <div>
            <div class="stat-val">{{ $stats['skills'] }}</div>
            <div class="stat-lbl">Skill & Tools</div>
        </div>
        <div class="stat-icon">⚡</div>
    </div>

    <div class="stat-card">
        <div>
            <div class="stat-val">{{ $stats['expertises'] }}</div>
            <div class="stat-lbl">Bidang Keahlian</div>
        </div>
        <div class="stat-icon">🎯</div>
    </div>

    <div class="stat-card">
        <div>
            <div class="stat-val">{{ $stats['milestones'] }}</div>
            <div class="stat-lbl">Total Milestone</div>
        </div>
        <div class="stat-icon">🎓</div>
    </div>

    <div class="stat-card">
        <div>
            <div class="stat-val">{{ $stats['principles'] }}</div>
            <div class="stat-lbl">Prinsip Kerja</div>
        </div>
        <div class="stat-icon">🧭</div>
    </div>

    <div class="stat-card">
        <div>
            <div class="stat-val">{{ $stats['contact_topics'] }}</div>
            <div class="stat-lbl">Topik Diskusi Kontak</div>
        </div>
        <div class="stat-icon">💬</div>
    </div>
</div>

<!-- Rincian Milestone per Tipe -->
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Distribusi Milestone Berdasarkan Tipe</h3>
        <a href="{{ route('admin.milestones.index') }}" class="btn btn-sm btn-ghost">Kelola Milestone →</a>
    </div>
    <div style="display: flex; flex-wrap: wrap; gap: 1rem;">
        @forelse ($milestonesByType as $type)
            <div style="background: var(--card); border: 2px solid var(--ink); border-radius: 10px; padding: 0.8rem 1.2rem; min-width: 170px;">
                <div style="font-size: 0.78rem; font-weight: 700; color: #4b5563;">{{ $type->name }}</div>
                <div style="font-size: 1.6rem; font-weight: 800; font-family: var(--font-mono); color: var(--ink);">
                    {{ $type->milestones_count }} <span style="font-size: 0.75rem; font-family: var(--font-sans); font-weight: 600;">item</span>
                </div>
            </div>
        @empty
            <p style="color: #6b7280;">Belum ada tipe milestone.</p>
        @endforelse
    </div>
</div>

<!-- Pintasan Cepat ke Setiap Modul CRUD -->
<h3 style="font-size: 1.1rem; font-weight: 800; margin-bottom: 1rem; margin-top: 2rem;">Pintasan Cepat Manajemen Modul</h3>
<div class="shortcuts-grid">
    <a href="{{ route('admin.profile.edit') }}" class="shortcut-item">
        <span class="shortcut-icon">👤</span>
        <span class="shortcut-title">Data Profil</span>
    </a>
    <a href="{{ route('admin.expertises.index') }}" class="shortcut-item">
        <span class="shortcut-icon">🎯</span>
        <span class="shortcut-title">Bidang Keahlian</span>
    </a>
    <a href="{{ route('admin.principles.index') }}" class="shortcut-item">
        <span class="shortcut-icon">🧭</span>
        <span class="shortcut-title">Prinsip Kerja</span>
    </a>
    <a href="{{ route('admin.skill-categories.index') }}" class="shortcut-item">
        <span class="shortcut-icon">📂</span>
        <span class="shortcut-title">Kategori Skill</span>
    </a>
    <a href="{{ route('admin.skills.index') }}" class="shortcut-item">
        <span class="shortcut-icon">⚡</span>
        <span class="shortcut-title">Daftar Skill</span>
    </a>
    <a href="{{ route('admin.project-categories.index') }}" class="shortcut-item">
        <span class="shortcut-icon">🏷️</span>
        <span class="shortcut-title">Kategori Proyek</span>
    </a>
    <a href="{{ route('admin.projects.index') }}" class="shortcut-item">
        <span class="shortcut-icon">🚀</span>
        <span class="shortcut-title">Data Proyek</span>
    </a>
    <a href="{{ route('admin.milestone-types.index') }}" class="shortcut-item">
        <span class="shortcut-icon">📑</span>
        <span class="shortcut-title">Tipe Milestone</span>
    </a>
    <a href="{{ route('admin.milestones.index') }}" class="shortcut-item">
        <span class="shortcut-icon">🎓</span>
        <span class="shortcut-title">Data Milestone</span>
    </a>
    <a href="{{ route('admin.contact-topics.index') }}" class="shortcut-item">
        <span class="shortcut-icon">💬</span>
        <span class="shortcut-title">Topik Kontak</span>
    </a>
</div>
@endsection

