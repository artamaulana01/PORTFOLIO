@php
  $projectsJs = $profile->projects->map(function ($p, $idx) use ($profile) {
      $categoryName = $p->category?->name ?? 'Web Developer';
      $isMobile = str_contains(strtolower($categoryName), 'mobile');
      $m1 = $p->infos->get(0);
      $m2 = $p->infos->get(1);
      $m3 = $p->infos->get(2);

            $artwork = '';
      if ($p->image_path) {
          $artwork = '<img src="' . asset($p->image_path) . '" alt="' . e($p->title) . '" class="w-full h-full object-cover min-h-[260px]">';
      } elseif (in_array($p->slug, ['cimart', 'tokoku', 'cibendamart'])) {
          $artwork = '
            <div class="w-full h-full bg-gradient-to-br from-amber-50 via-white to-orange-50 p-5 flex flex-col justify-between relative min-h-[260px]">
              <div class="flex items-center justify-between border-b border-amber-200 pb-2">
                <div class="flex items-center gap-2">
                  <span class="px-2 py-0.5 rounded bg-orange-500 text-white font-extrabold text-[10px]">CiMart</span>
                  <span class="text-[10px] font-bold text-slate-500">E-Commerce Desa Digital</span>
                </div>
                <span class="px-2 py-0.5 rounded-full bg-emerald-100 text-emerald-800 font-bold text-[10px]">● Terverifikasi UMKM</span>
              </div>
              <div class="grid grid-cols-12 gap-3 my-3 items-center">
                <div class="col-span-7 bg-gradient-to-r from-orange-500 to-amber-500 rounded-xl p-4 text-white border-2 border-slate-900 shadow-[3px_3px_0px_#0f172a]">
                  <span class="inline-block px-2 py-0.5 rounded bg-white/20 text-[9px] font-bold uppercase mb-1">Langsung Dari Petani & UMKM Desa</span>
                  <div class="font-extrabold text-sm md:text-base leading-tight mb-2">Belanja Kebutuhan Harian dari UMKM Cibenda</div>
                  <div class="inline-block px-2.5 py-1 rounded-lg bg-slate-900 text-amber-300 text-[10px] font-extrabold">Jelajahi Produk →</div>
                </div>
                <div class="col-span-5 grid grid-cols-2 gap-2">
                  <div class="p-2.5 rounded-xl bg-white border-2 border-slate-900 text-center shadow-[2px_2px_0px_#0f172a]">
                    <div class="text-2xl mb-1">🌾</div>
                    <div class="text-[10px] font-extrabold text-slate-900">Beras Desa</div>
                    <div class="text-[9px] font-bold text-emerald-600">Rp 68.000</div>
                  </div>
                  <div class="p-2.5 rounded-xl bg-white border-2 border-slate-900 text-center shadow-[2px_2px_0px_#0f172a]">
                    <div class="text-2xl mb-1">🍯</div>
                    <div class="text-[10px] font-extrabold text-slate-900">Madu Hutan</div>
                    <div class="text-[9px] font-bold text-emerald-600">Rp 85.000</div>
                  </div>
                </div>
              </div>
              <div class="flex items-center justify-between text-[10px] font-bold text-slate-500">
                <span>✔ Pengiriman Kurir Lokal • Pangandaran</span>
                <span class="px-2.5 py-1 rounded-lg bg-amber-400 text-slate-900 border-2 border-slate-900 font-extrabold shadow-[2px_2px_0px_#0f172a]">⚙ Buka Arsitektur Sistem</span>
              </div>
            </div>';
      } elseif (in_array($p->slug, ['villanakey', 'villaku'])) {
          $artwork = '
            <div class="w-full h-full bg-[#faf8f5] flex flex-col items-center justify-center p-6 relative min-h-[260px]">
              <div class="w-36 h-36 rounded-full bg-[#0f172a] border-4 border-amber-400 shadow-[4px_4px_0px_#0f172a] flex flex-col items-center justify-center text-white relative">
                <svg width="54" height="28" viewBox="0 0 60 30" class="mb-1">
                  <path d="M6,26 L30,6 L54,26" fill="none" stroke="#facc15" stroke-width="3.5" stroke-linecap="round"/>
                  <rect x="24" y="16" width="12" height="10" fill="none" stroke="#ffffff" stroke-width="2"/>
                </svg>
                <div class="text-lg font-extrabold tracking-wide leading-none">Villa</div>
                <div class="text-sm font-bold text-amber-300 tracking-wider">Na Key</div>
              </div>
              <div class="absolute top-4 left-4 flex items-center gap-1.5 px-2.5 py-0.5 rounded-full bg-emerald-100 border border-slate-900 text-[10px] font-bold text-emerald-800">
                <span>●</span> <span>Reservasi Real-Time Aktif</span>
              </div>
              <div class="absolute bottom-3 right-3 px-2.5 py-1 rounded-lg bg-amber-400 text-slate-900 border-2 border-slate-900 text-[10px] font-extrabold shadow-[2px_2px_0px_#0f172a]">
                ⚙ Buka Arsitektur Sistem
              </div>
            </div>';
      } elseif (in_array($p->slug, ['kalorinai', 'kaloriku'])) {
          $artwork = '
            <div class="w-full h-full bg-white flex flex-col items-center justify-center p-6 relative overflow-hidden min-h-[260px]">
              <div class="flex flex-col items-center">
                <div class="flex items-center gap-2 -rotate-6 mb-2">
                  <div class="w-16 h-3.5 rounded-full bg-lime-400 border-2 border-slate-900"></div>
                  <div class="w-24 h-3.5 rounded-full bg-emerald-500 border-2 border-slate-900"></div>
                </div>
                <div class="text-3xl md:text-4xl font-extrabold italic tracking-tight text-emerald-600 drop-shadow-[2px_2px_0px_#0f172a]">
                  KALORIN <span class="text-lime-500">AI</span>
                </div>
                <div class="flex items-center gap-2 -rotate-6 mt-2">
                  <div class="w-24 h-3.5 rounded-full bg-amber-300 border-2 border-slate-900"></div>
                  <div class="w-14 h-3.5 rounded-full bg-lime-400 border-2 border-slate-900"></div>
                </div>
              </div>
              <div class="absolute top-4 left-4 flex items-center gap-1.5 px-2.5 py-0.5 rounded-full bg-sky-100 border border-slate-900 text-[10px] font-bold text-sky-800">
                <span>⚡</span> <span>Computer Vision Food AI</span>
              </div>
              <div class="absolute bottom-3 right-3 px-2.5 py-1 rounded-lg bg-amber-400 text-slate-900 border-2 border-slate-900 text-[10px] font-extrabold shadow-[2px_2px_0px_#0f172a]">
                ⚙ Buka Arsitektur Sistem
              </div>
            </div>';
      } else {
          $brandColor = $p->color ?: '#0284c7';
          $artwork = '
            <div class="w-full h-full p-6 flex flex-col items-center justify-center relative min-h-[260px]" style="background: linear-gradient(135deg, ' . $brandColor . '15 0%, #ffffff 100%);">
              <div class="p-6 rounded-2xl border-3 border-slate-900 shadow-[4px_4px_0px_#0f172a] text-center max-w-sm" style="background:' . $brandColor . '25;">
                <span class="inline-block px-3 py-1 rounded-full text-xs font-mono-code font-extrabold border-2 border-slate-900 mb-2 bg-white">' . e($categoryName) . '</span>
                <div class="text-xl font-extrabold text-slate-900">' . e($p->title) . '</div>
                <div class="text-xs font-semibold text-slate-600 mt-1">' . e($p->subtitle) . '</div>
              </div>
              <div class="absolute bottom-3 right-3 px-2.5 py-1 rounded-lg bg-sky-600 text-white border-2 border-slate-900 text-[10px] font-extrabold shadow-[2px_2px_0px_#0f172a]">
                🔍 Buka Arsitektur Sistem
              </div>
            </div>';
      }

      return [
          'code' => sprintf('%02d // %s', $idx + 1, strtoupper($categoryName)),
          'roleBadge' => $p->meta ?: $categoryName,
          'cat' => $p->category?->slug ?: 'web',
          'title' => $p->title,
          'subtitle' => $p->subtitle,
          'desc' => $p->summary,
          'm1Label' => strtoupper($m1?->label ?? 'ARCHITECTURE'),
          'm1Val' => $m1?->value ?? ($p->meta ?: 'Full-Stack Dev'),
          'm2Label' => strtoupper($m2?->label ?? 'ORCHESTRATION'),
          'm2Val' => $m2?->value ?? ($p->skills->first()?->name ?? 'Laravel'),
          'm3Label' => strtoupper($m3?->label ?? 'SERVICE'),
          'm3Val' => $m3?->value ?? ($isMobile ? 'Mobile App' : 'Web Platform'),
          'url' => $p->url ?: ($p->github_url ?: '#'),
          'platformBadge' => $isMobile ? 'FLUTTER NATIVE' : 'WEB PLATFORM',
          'tech' => $p->skills->pluck('name')->all(),
          'mandate' => $p->background ?: $p->summary,
          'arch' => $p->points->pluck('body')->all(),
          'challenge' => $p->summary,
          'github' => $p->github_url ?: $profile->github,
          'artworkHtml' => $artwork,
      ];
  });
  $firstProj = $projectsJs->first();
  $totalSkills = $skillCategories->sum(fn($c) => $c->skills->count());
@endphp
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>{{ $profile->name }} | {{ $profile->role }}</title>
  <meta name="description" content="{{ $profile->headline }} - {{ $profile->tagline }}" />
  <meta name="author" content="{{ $profile->name }}" />
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=JetBrains+Mono:wght@500;600;700;800&family=Plus+Jakarta+Sans:ital,wght@0,400;0,500;0,600;0,700;0,800;1,800&display=swap" rel="stylesheet">
  <script src="https://cdn.tailwindcss.com"></script>
  <style>
    :root {
      --ink: #0f172a;
      --ocean-top: #0284c7;
      --ocean-mid: #0369a1;
      --ocean-deep: #075985;
      --ocean-abyss: #082f49;
      --sand: #fef9c3;
      --sand-warm: #fde68a;
      --yel: #facc15;
      --yel-light: #fef08a;
      --sky: #0284c7;
      --mint: #bbf7d0;
    }
    * {
      box-sizing: border-box;
      font-family: 'Plus Jakarta Sans', -apple-system, BlinkMacSystemFont, sans-serif;
    }
    html {
      margin: 0;
      padding: 0;
      scroll-behavior: smooth;
      background: #036194;
    }
    body {
      margin: 0;
      padding: 0;
      overflow-x: clip;
      background: #036194;
      color: #0f172a;
    }
    .font-mono-code {
      font-family: 'JetBrains Mono', monospace !important;
    }

    /* ================= NEUBRUTALISM CORE ================= */
    .nb-card {
      background: #ffffff !important;
      color: #0f172a !important;
      border: 3px solid #0f172a !important;
      border-radius: 20px;
      box-shadow: 6px 6px 0px #0f172a !important;
    }
    .nb-card-sm {
      background: #ffffff;
      color: #0f172a;
      border: 2.5px solid #0f172a;
      border-radius: 14px;
      box-shadow: 4px 4px 0px #0f172a;
    }
    .nb-btn {
      display: inline-flex;
      align-items: center;
      justify-content: center;
      gap: 8px;
      font-weight: 800;
      border: 2.5px solid #0f172a !important;
      border-radius: 12px;
      box-shadow: 4px 4px 0px #0f172a !important;
      transition: transform 0.15s ease, box-shadow 0.15s ease, background-color 0.15s ease;
      cursor: pointer;
      user-select: none;
      text-decoration: none !important;
    }
    .nb-btn:hover {
      transform: translate(-2px, -2px);
      box-shadow: 6px 6px 0px #0f172a !important;
    }
    .nb-btn:active {
      transform: translate(2px, 2px);
      box-shadow: 1px 1px 0px #0f172a !important;
    }

    /* ================= 1. SPLASH LOADER (1:1 DENGAN REFERENSI WEB PORTFOLIO) ================= */
    #loader {
      position: fixed;
      inset: 0;
      z-index: 10000;
      display: grid;
      place-items: center;
      text-align: center;
      background: #071b2f;
      color: #ffffff;
      overflow: hidden;
      cursor: pointer;
      user-select: none;
      transition: opacity 0.5s ease, visibility 0.5s ease;
    }
    #loader.hide {
      opacity: 0;
      visibility: hidden;
      pointer-events: none !important;
    }
    #loader.hide * {
      pointer-events: none !important;
    }
    .ld-water-rise {
      position: absolute;
      inset: 0;
      width: 100%;
      height: 100%;
      background: linear-gradient(180deg, #0284c7 0%, #0369a1 50%, #075985 100%);
      transform: translateY(100%);
      will-change: transform;
      z-index: 1;
      pointer-events: none;
    }
    .ld-water-crest {
      position: absolute;
      top: -62px;
      left: 0;
      width: 100%;
      height: 64px;
      pointer-events: none;
    }
    .ld-water-crest svg {
      width: 100%;
      height: 100%;
      display: block;
    }
    .ld-bubbles {
      position: absolute;
      inset: 0;
      pointer-events: none;
      overflow: hidden;
      z-index: 3;
    }
    .ld-bubble {
      position: absolute;
      bottom: -40px;
      border-radius: 50%;
      background: radial-gradient(circle at 32% 32%, rgba(255,255,255,0.95), rgba(255,255,255,0.2) 65%, transparent 100%);
      border: 1px solid rgba(255,255,255,0.65);
      box-shadow: inset 0 0 6px rgba(255,255,255,0.5), 0 0 8px rgba(56, 189, 248, 0.4);
      animation: ldRise linear infinite;
      pointer-events: none;
    }
    @keyframes ldRise {
      0% {
        transform: translateY(0) translateX(0);
        opacity: 0;
      }
      12% {
        opacity: 0.85;
      }
      85% {
        opacity: 0.85;
      }
      100% {
        transform: translateY(-115vh) translateX(30px);
        opacity: 0;
      }
    }
    .ld-box {
      position: relative;
      z-index: 5;
      width: min(560px, 94vw);
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      gap: 0.45rem;
      pointer-events: auto;
    }
    
    /* Pop-up animation keyframe - diperhalus, smooth, fluid spring deceleration */
    @keyframes ldPopInSmooth {
      0% {
        opacity: 0;
        transform: scale(0.72) translateY(24px);
      }
      68% {
        opacity: 1;
        transform: scale(1.04) translateY(-3px);
      }
      100% {
        opacity: 1;
        transform: scale(1) translateY(0);
      }
    }

    .ld-logo-wrap {
      width: 76px;
      height: 76px;
      border-radius: 50%;
      padding: 3px;
      background: #dc2626; /* One Piece Luffy red ring */
      border: 3.5px solid #ffffff;
      box-shadow: 0 10px 25px rgba(2, 44, 76, 0.5), 0 0 0 4px rgba(220, 38, 38, 0.35);
      display: flex;
      align-items: center;
      justify-content: center;
      overflow: hidden;
      margin-bottom: 2px;
      opacity: 0;
      transform: scale(0.72) translateY(24px);
      will-change: transform, opacity;
    }
    @keyframes ldBuoyBob {
      0% { transform: translateY(0) rotate(-2.5deg); }
      100% { transform: translateY(-7px) rotate(2.5deg); }
    }
    .ld-logo-wrap.popped {
      animation: ldPopInSmooth 0.72s cubic-bezier(0.16, 1, 0.3, 1) forwards,
                 ldBuoyBob 2.8s ease-in-out 0.72s infinite alternate;
    }
    .ld-logo-wrap img {
      width: 100%;
      height: 100%;
      border-radius: 50%;
      object-fit: cover;
      display: block;
    }
    .ld-title {
      display: flex;
      flex-direction: column;
      align-items: center;
      gap: 0.08rem;
      font-family: 'Plus Jakarta Sans', -apple-system, BlinkMacSystemFont, sans-serif;
      font-size: clamp(1.85rem, 5vw, 2.5rem);
      font-weight: 800;
      letter-spacing: 0.16em;
      color: #ffffff;
      text-transform: uppercase;
      text-shadow: 0 4px 14px rgba(7, 40, 68, 0.6), 2px 3px 0 #0f172a;
      margin: 0;
      line-height: 1.08;
      text-align: center;
      opacity: 0;
      transform: scale(0.72) translateY(24px);
      will-change: transform, opacity;
    }
    .ld-title.popped {
      animation: ldPopInSmooth 0.74s cubic-bezier(0.16, 1, 0.3, 1) 0.08s forwards;
    }
    .ld-sub {
      font-family: 'JetBrains Mono', monospace;
      font-size: clamp(0.72rem, 1.8vw, 0.85rem);
      letter-spacing: 0.32em;
      color: #facc15;
      font-weight: 800;
      text-transform: uppercase;
      margin-top: 3px;
      text-shadow: 0 2px 8px rgba(0, 0, 0, 0.45);
      text-align: center;
      opacity: 0;
      transform: scale(0.72) translateY(24px);
      will-change: transform, opacity;
    }
    .ld-sub.popped {
      animation: ldPopInSmooth 0.74s cubic-bezier(0.16, 1, 0.3, 1) 0.16s forwards;
    }
    .ld-progress-wrap {
      width: clamp(220px, 42vw, 280px);
      margin-top: 8px;
      opacity: 0;
      transform: scale(0.72) translateY(24px);
      will-change: transform, opacity;
    }
    .ld-progress-wrap.popped {
      animation: ldPopInSmooth 0.74s cubic-bezier(0.16, 1, 0.3, 1) 0.24s forwards;
    }
    .ld-bar {
      display: block;
      height: 7.5px;
      border-radius: 999px;
      background: rgba(15, 23, 42, 0.55);
      border: 1.5px solid rgba(255, 255, 255, 0.45);
      overflow: hidden;
      padding: 1px;
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.3);
    }
    .ld-bar b {
      display: block;
      height: 100%;
      width: 0%;
      background: linear-gradient(90deg, #facc15 0%, #38bdf8 100%);
      border-radius: 999px;
      box-shadow: 0 0 10px rgba(250, 204, 21, 0.75);
      transition: width 0.05s linear;
    }
    #skip {
      position: fixed;
      top: 22px;
      right: 24px;
      z-index: 10005;
      padding: 6px 16px;
      border: 1.5px solid rgba(255, 255, 255, 0.45);
      border-radius: 999px;
      background: rgba(15, 23, 42, 0.45);
      backdrop-filter: blur(8px);
      color: #ffffff;
      font-family: 'JetBrains Mono', monospace;
      font-size: 0.75rem;
      font-weight: 600;
      letter-spacing: 0.05em;
      cursor: pointer;
      transition: all 0.2s ease;
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
    }
    #skip:hover {
      background: #facc15;
      color: #0f172a;
      border-color: #0f172a;
      transform: translateY(-2px);
      box-shadow: 2px 2px 0 #0f172a;
    }

    /* ================= 2. FULL-WIDTH GLASS OCEAN NAVBAR WITH SLIDING GLIDER ================= */
    .ocean-nav {
      position: fixed;
      top: 0;
      left: 0;
      right: 0;
      width: 100%;
      z-index: 1000;
      background: transparent;
      border-bottom: 1px solid transparent;
      transition: background 0.35s ease, border-color 0.35s ease, box-shadow 0.35s ease;
    }
    .ocean-nav a,
    .ocean-nav a:focus,
    .ocean-nav a:focus-visible,
    .ocean-nav a:active,
    .brand-link,
    .brand-link:focus,
    .brand-link:focus-visible,
    .brand-link:active {
      outline: none !important;
      outline-style: none !important;
      box-shadow: none !important;
      border: none !important;
      -webkit-tap-highlight-color: transparent !important;
    }
    .ocean-nav-inner {
      max-width: 1180px;
      margin: 0 auto;
      padding: 14px 24px;
      display: flex;
      align-items: center;
      justify-content: space-between;
      transition: padding 0.3s ease;
    }
    .ocean-nav.scrolled {
      background: rgba(11, 95, 130, 0.62);
      backdrop-filter: blur(16px);
      -webkit-backdrop-filter: blur(16px);
      border-bottom: 1px solid rgba(255, 255, 255, 0.2);
      box-shadow: 0 8px 26px rgba(3, 105, 161, 0.16);
    }
    .ocean-nav.scrolled .ocean-nav-inner {
      padding: 10px 24px;
    }
    #menu {
      position: relative;
      background: rgba(255, 255, 255, 0.12);
      backdrop-filter: blur(12px);
      -webkit-backdrop-filter: blur(12px);
      border: 1px solid rgba(255, 255, 255, 0.28);
      border-radius: 9999px;
      padding: 4px;
      gap: 2px;
    }
    @media (min-width: 768px) {
      #menu {
        display: flex !important;
        align-items: center;
      }
    }
    .nav-glider {
      position: absolute;
      top: 4px;
      bottom: 4px;
      left: 0;
      width: 0;
      background: rgba(255, 255, 255, 0.26);
      border: 1px solid rgba(255, 255, 255, 0.48);
      border-radius: 9999px;
      box-shadow: 0 2px 12px rgba(255, 255, 255, 0.18);
      pointer-events: none;
      z-index: 1;
      will-change: transform, width;
      transition: transform 380ms cubic-bezier(0.22, 1, 0.36, 1), width 380ms cubic-bezier(0.22, 1, 0.36, 1), opacity 200ms ease;
    }
    .nav-pill-link {
      position: relative;
      z-index: 2;
      padding: 6px 16px;
      border-radius: 9999px;
      font-size: 13px;
      font-weight: 700;
      color: rgba(255, 255, 255, 0.85);
      transition: color 0.2s ease;
      text-decoration: none;
      white-space: nowrap;
    }
    .nav-pill-link:hover,
    .nav-pill-link.active {
      color: #ffffff !important;
    }

    /* ================= 3. HERO SECTION, SPRITES & 2D PHYSICS ================= */
    #hero {
      position: relative;
      min-height: 100vh;
      width: 100%;
      background: linear-gradient(180deg, #0369a1 0%, #0284c7 48%, #0ea5e9 88%, #38bdf8 100%);
      overflow: hidden;
      display: flex;
      flex-direction: column;
      justify-content: space-between;
    }
    .hero-waves-container {
      position: absolute;
      left: 0;
      right: 0;
      top: 38%;
      height: 85px;
      pointer-events: none;
      overflow: hidden;
      z-index: 3;
    }
    .hero-wave-line {
      position: absolute;
      left: -360px;
      width: calc(100% + 720px);
      height: 36px;
      background-repeat: repeat-x;
      background-size: 360px 36px;
    }
    .hero-wave-line.line-1 {
      top: 0;
      opacity: 0.75;
      background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='360' height='36' fill='none'%3E%3Cpath d='M0 18 Q90 4 180 18 T360 18' stroke='%23ffffff' stroke-width='2.5' stroke-linecap='round'/%3E%3C/svg%3E");
      animation: waveDrift1 12s linear infinite;
    }
    .hero-wave-line.line-2 {
      top: 24px;
      opacity: 0.55;
      background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='360' height='36' fill='none'%3E%3Cpath d='M0 18 Q90 32 180 18 T360 18' stroke='%23ffffff' stroke-width='2.2' stroke-linecap='round'/%3E%3C/svg%3E");
      animation: waveDrift1 15s linear infinite reverse;
    }
    .hero-wave-line.line-3 {
      top: 48px;
      opacity: 0.35;
      background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='360' height='36' fill='none'%3E%3Cpath d='M0 18 Q90 8 180 18 T360 18' stroke='%23ffffff' stroke-width='1.8' stroke-linecap='round'/%3E%3C/svg%3E");
      animation: waveDrift1 20s linear infinite;
    }
    @keyframes waveDrift1 { from { transform: translateX(0); } to { transform: translateX(360px); } }

    .physics-letter {
      display: inline-block;
      font-size: clamp(3.3rem, 7vw, 5.5rem);
      font-weight: 800;
      color: #ffffff;
      text-shadow: 0 4px 0 #0284c7, 0 6px 0 #0369a1, 0 10px 20px rgba(2, 44, 76, 0.45);
      cursor: grab;
      user-select: none;
      touch-action: none;
      line-height: 1.02;
      padding: 0 5px;
      will-change: transform;
      position: relative;
      z-index: 25;
      transition: color 0.15s ease;
    }
    .physics-letter:hover {
      color: #fde047;
    }
    .physics-letter:active {
      cursor: grabbing;
    }

    /* Water Ripple & Splash Droplets */
    .water-ripple {
      position: absolute;
      width: 28px;
      height: 28px;
      border: 2.5px solid rgba(255, 255, 255, 0.85);
      border-radius: 50%;
      pointer-events: none;
      transform: translate(-50%, -50%) scale(0.2);
      z-index: 15;
      animation: rippleExpand 0.75s cubic-bezier(0.1, 0.8, 0.3, 1) forwards;
    }
    @keyframes rippleExpand {
      0% { transform: translate(-50%, -50%) scale(0.2); opacity: 0.95; }
      100% { transform: translate(-50%, -50%) scale(2.8); opacity: 0; }
    }
    .splash-drop {
      position: absolute;
      width: 7px;
      height: 7px;
      border-radius: 50%;
      background: #ffffff;
      border: 1.5px solid #0f172a;
      pointer-events: none;
      z-index: 35;
      animation: dropFly 0.6s cubic-bezier(0.25, 1, 0.5, 1) forwards;
    }
    @keyframes dropFly {
      0% { transform: translate(0, 0) scale(1); opacity: 1; }
      100% { transform: translate(var(--dx), var(--dy)) scale(0.35); opacity: 0; }
    }

    /* Speech Bubble Single-Line Neubrutalist */
    .speech-bubble {
      position: absolute;
      bottom: calc(100% + 10px);
      left: 50%;
      transform: translateX(-50%) scale(0.65);
      background: #fde047;
      color: #0f172a !important;
      border: 2.5px solid #0f172a;
      border-radius: 999px;
      box-shadow: 3px 3px 0px #0f172a;
      padding: 6px 14px;
      font: 800 11.5px 'JetBrains Mono', monospace;
      white-space: nowrap !important;
      pointer-events: none;
      opacity: 0;
      z-index: 80;
      transition: opacity 0.2s ease, transform 0.22s cubic-bezier(0.34, 1.56, 0.64, 1);
    }
    .speech-bubble::after {
      content: "";
      position: absolute;
      top: 100%;
      left: 50%;
      transform: translateX(-50%);
      border-width: 6px 6px 0 6px;
      border-style: solid;
      border-color: #0f172a transparent transparent transparent;
    }
    .speech-bubble.active {
      opacity: 1;
      transform: translateX(-50%) scale(1);
    }

    /* Seagull Flight & Realistic Wing Flapping */
    #gullFlight {
      position: absolute;
      top: 14%;
      left: -140px;
      width: 64px;
      height: 48px;
      z-index: 35;
      pointer-events: auto;
      cursor: pointer;
      will-change: transform;
      user-select: none;
    }
    #gullFlight .speech-bubble {
      top: calc(100% + 8px);
      bottom: auto;
      background: #ffffff;
      white-space: nowrap;
    }
    #gullFlight .speech-bubble::after {
      top: auto;
      bottom: 100%;
      border-width: 0 6px 6px 6px;
      border-color: transparent transparent #0f172a transparent;
    }
    
    /* 3-State Flapping Wings Cycle */
    .gull-wing-up-back, .gull-wing-up-front {
      opacity: 0;
      visibility: hidden;
      animation: gullFrameUp 0.44s steps(1) infinite;
    }
    .gull-wing-mid-back, .gull-wing-mid-front {
      opacity: 0;
      visibility: hidden;
      animation: gullFrameMid 0.44s steps(1) infinite;
    }
    .gull-wing-down-back, .gull-wing-down-front {
      opacity: 0;
      visibility: hidden;
      animation: gullFrameDown 0.44s steps(1) infinite;
    }

    @keyframes gullFrameUp {
      0%, 24.9% { opacity: 1; visibility: visible; }
      25%, 100% { opacity: 0; visibility: hidden; }
    }
    @keyframes gullFrameMid {
      0%, 24.9% { opacity: 0; visibility: hidden; }
      25%, 49.9% { opacity: 1; visibility: visible; }
      50%, 74.9% { opacity: 0; visibility: hidden; }
      75%, 100% { opacity: 1; visibility: visible; }
    }
    @keyframes gullFrameDown {
      0%, 49.9% { opacity: 0; visibility: hidden; }
      50%, 74.9% { opacity: 1; visibility: visible; }
      75%, 100% { opacity: 0; visibility: hidden; }
    }

    @keyframes boatRock {
      0% { transform: translateY(0) rotate(-3deg); }
      100% { transform: translateY(-7px) rotate(3deg); }
    }
    @keyframes palmSway {
      0% { transform: rotate(-2deg); }
      100% { transform: rotate(2deg); }
    }
    @keyframes ballFloat {
      0%, 100% { transform: translate(156px, 57px) rotate(-10deg); }
      50% { transform: translate(156px, 50px) rotate(-6deg); }
    }
    @keyframes shadowPulse {
      0%, 100% { transform: scale(1); opacity: 0.35; }
      50% { transform: scale(0.82); opacity: 0.22; }
    }
    .animate-boat { animation: boatRock 3.8s ease-in-out infinite alternate; }
    .animate-palm { transform-origin: bottom center; animation: palmSway 4s ease-in-out infinite alternate; }
    .animate-volleyball { animation: ballFloat 2.6s ease-in-out infinite; }
    .animate-ball-shadow { transform-origin: 156px 69px; animation: shadowPulse 2.6s ease-in-out infinite; }

    /* ================= 4. PROFIL & FLOOD BEACH / REBUILD OVERLAY (1:1 REFERENCE) ================= */
    .flood-tsunami {
      position: fixed;
      top: 0;
      bottom: 0;
      left: 0;
      width: 145vw;
      z-index: 9500;
      pointer-events: none;
      display: flex;
      align-items: stretch;
      visibility: hidden;
      will-change: transform;
      contain: layout style paint;
      backface-visibility: hidden;
      transform: translate3d(-150vw, 0, 0);
    }
    .flood-tsunami.sweep {
      visibility: visible;
      animation: tsunamiSweepRight 1.3s cubic-bezier(0.25, 0.1, 0.25, 1) forwards;
    }
    @keyframes tsunamiSweepRight {
      0% { transform: translate3d(-150vw, 0, 0); }
      100% { transform: translate3d(115vw, 0, 0); }
    }
    .physics-collapsible {
      will-change: transform;
      position: relative;
      touch-action: none;
    }
    .physics-collapsible.smooth-restore {
      transition: transform 0.65s cubic-bezier(0.34, 1.56, 0.64, 1) !important;
    }
    .physics-collapsible.flooded-card {
      cursor: grab !important;
      z-index: 35;
      user-select: none;
    }
    .physics-collapsible.flooded-card:active {
      cursor: grabbing !important;
      z-index: 60;
    }
    .sand-puddles {
      opacity: 0;
      transform: scale(0.92);
      transition: opacity 0.6s ease, transform 0.6s cubic-bezier(0.22, 1, 0.36, 1);
    }
    #profil.is-flooded .sand-puddles {
      opacity: 1;
      transform: scale(1);
    }
    .sandcastle-intact {
      transition: opacity 0.45s ease, transform 0.5s cubic-bezier(0.34, 1.56, 0.64, 1);
      transform-origin: bottom center;
    }
    .sandcastle-ruined {
      opacity: 0;
      transform: translateX(-18px) scale(0.85);
      transition: opacity 0.5s ease 0.1s, transform 0.55s cubic-bezier(0.22, 1, 0.36, 1) 0.1s;
      transform-origin: bottom center;
    }
    #profil.is-flooded .sandcastle-intact {
      opacity: 0;
      transform: translateX(22px) scaleY(0.35) scaleX(1.25);
    }
    #profil.is-flooded .sandcastle-ruined {
      opacity: 1;
      transform: translateX(0) scale(1);
    }

    /* Fullscreen Cloud Bubble Rebuild Overlay (Exact Reference Match: Crisp Fluffy Clouds, No Box Border!) */
    #rebuildOverlay {
      position: fixed;
      inset: 0;
      z-index: 9995;
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      background: radial-gradient(circle at 50% 45%, #f0f9ff 0%, #bae6fd 55%, #7dd3fc 100%);
      color: #0f172a;
      opacity: 0;
      visibility: hidden;
      pointer-events: none;
      transition: opacity 0.32s ease, visibility 0.32s ease;
      overflow: hidden;
    }
    #rebuildOverlay.active {
      opacity: 1;
      visibility: visible;
      pointer-events: auto;
    }
    .cloud-cluster {
      filter: drop-shadow(0 18px 36px rgba(3, 105, 161, 0.16));
      animation: cloudBreathe 2.8s ease-in-out infinite alternate;
    }
    .cloud-drifter {
      position: absolute;
      filter: drop-shadow(0 10px 20px rgba(3, 105, 161, 0.12));
      animation: cloudDrift 3.6s ease-in-out infinite alternate;
    }
    @keyframes cloudBreathe {
      0% { transform: scale(0.97) translateY(3px); }
      100% { transform: scale(1.03) translateY(-4px); }
    }
    @keyframes cloudDrift {
      0% { transform: translateX(-10px) translateY(2px); }
      100% { transform: translateX(12px) translateY(-6px); }
    }
    @keyframes toolRockLeft {
      0%, 100% { transform: translateY(0) rotate(-14deg); }
      50% { transform: translateY(-10px) rotate(-4deg); }
    }
    @keyframes toolRockCenter {
      0%, 100% { transform: translateY(-4px) rotate(4deg) scale(1); }
      50% { transform: translateY(-16px) rotate(-5deg) scale(1.06); }
    }
    @keyframes toolRockRight {
      0%, 100% { transform: translateY(0) rotate(14deg); }
      50% { transform: translateY(-10px) rotate(4deg); }
    }
    .anim-tool-left { animation: toolRockLeft 0.75s ease-in-out infinite; }
    .anim-tool-center { animation: toolRockCenter 0.75s ease-in-out 0.15s infinite; }
    .anim-tool-right { animation: toolRockRight 0.75s ease-in-out 0.3s infinite; }

    /* ================= 5. AMBIENT UNDERWATER & FORWARD-SWIMMING FISH ================= */
    .fx-ambient {
      position: absolute;
      inset: 0;
      pointer-events: none;
      overflow: hidden;
      z-index: 1;
    }
    .fx-bubble {
      position: absolute;
      bottom: -30px;
      border-radius: 50%;
      background: rgba(255, 255, 255, 0.24);
      border: 1.5px solid rgba(255, 255, 255, 0.5);
      animation: ldRise linear infinite;
    }
    .fx-bubble.nb-bubble {
      background: #ffffff;
      border: 2px solid #0f172a;
      box-shadow: 2px 2px 0px rgba(15, 23, 42, 0.2);
      opacity: 0.92;
    }
    .fish-swimmer {
      position: absolute;
      pointer-events: none;
      z-index: 2;
      will-change: transform;
    }
    /* FIXED: fish1-3.svg menghadap kanan secara asli -> scaleX(1) saat berenang kiri ke kanan, scaleX(-1) saat kanan ke kiri */
    @keyframes fishSwimRight {
      0% { transform: translateX(-120px) translateY(0) scaleX(1); }
      50% { transform: translateX(50vw) translateY(-16px) scaleX(1); }
      100% { transform: translateX(calc(100vw + 140px)) translateY(10px) scaleX(1); }
    }
    @keyframes fishSwimLeft {
      0% { transform: translateX(calc(100vw + 140px)) translateY(0) scaleX(-1); }
      50% { transform: translateX(45vw) translateY(14px) scaleX(-1); }
      100% { transform: translateX(-140px) translateY(-8px) scaleX(-1); }
    }
    #flagshipCardStage {
      transition: opacity 0.22s cubic-bezier(0.16, 1, 0.3, 1), transform 0.22s cubic-bezier(0.16, 1, 0.3, 1);
      will-change: opacity, transform;
    }
    .modal-custom-scroll {
      scroll-behavior: smooth;
      overscroll-behavior: contain;
      scrollbar-width: thin;
      scrollbar-color: #facc15 #f1f5f9;
    }
    .modal-custom-scroll::-webkit-scrollbar {
      width: 8px;
    }
    .modal-custom-scroll::-webkit-scrollbar-track {
      background: #f1f5f9;
      border-radius: 9999px;
      border: 1.5px solid #0f172a;
    }
    .modal-custom-scroll::-webkit-scrollbar-thumb {
      background: #facc15;
      border-radius: 9999px;
      border: 1.5px solid #0f172a;
    }
    .modal-custom-scroll::-webkit-scrollbar-thumb:hover {
      background: #eab308;
    }

    /* ================= 6. TECH STACK CONTOUR & DIMMING ================= */
    .tech-container-dashed {
      border-left: 2px dashed rgba(15, 23, 42, 0.25);
      border-right: 2px dashed rgba(15, 23, 42, 0.25);
    }
    .stack-layer-card {
      position: relative;
      overflow: hidden;
      transition: opacity 0.3s ease, filter 0.3s ease, transform 0.3s ease;
    }
    .stack-layer-card.dimmed {
      opacity: 0.25 !important;
      filter: grayscale(1) !important;
      transform: scale(0.98) !important;
    }
    .layer-contour-bg {
      position: absolute;
      inset: 0;
      background-image: radial-gradient(#cbd5e1 1.25px, transparent 1.25px);
      background-size: 16px 16px;
      opacity: 0.45;
      pointer-events: none;
    }

    /* ================= 7. MILESTONE SCROLL-LINKED RAINBOW TIMELINE ================= */
    .timeline-spine-track {
      position: absolute;
    }
    #timelineProgressFill {
      height: 0%;
      width: 100%;
      position: relative;
      overflow: hidden;
      border-radius: 9999px;
      will-change: height;
    }
    .timeline-rainbow-inner {
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      border-radius: 9999px;
      background: linear-gradient(180deg, 
        #ff2d55 0%, 
        #ff3b30 8%, 
        #ff9500 20%, 
        #ffcc00 34%, 
        #34c759 48%, 
        #00c7be 62%, 
        #007aff 76%, 
        #5856d6 88%, 
        #af52de 100%
      );
      box-shadow: 0 0 16px rgba(255, 255, 255, 0.9), 0 0 8px rgba(52, 199, 89, 0.6);
    }
    .node-circle {
      transition: transform 0.35s cubic-bezier(0.34, 1.56, 0.64, 1), box-shadow 0.3s ease;
    }
    .node-circle.active {
      transform: scale(1.15);
      box-shadow: 0 0 16px rgba(250, 204, 21, 0.95), 3px 3px 0px #0f172a !important;
    }

    /* ================= 8. KONTAK 3D FLIP CARD & ANGLERFISH ================= */
    @keyframes anglerFloat {
      0% { transform: translate(0, 0) rotate(-2deg); }
      100% { transform: translate(24px, -16px) rotate(4deg); }
    }
    .animate-angler {
      animation: anglerFloat 6s ease-in-out infinite alternate;
    }
    @keyframes subFloat {
      0%, 100% { transform: translateY(0) rotate(0deg); }
      50% { transform: translateY(-10px) rotate(-3deg); }
    }
    .animate-submarine {
      animation: subFloat 5s ease-in-out infinite;
    }
    .flip-scene {
      perspective: 1200px;
      width: 100%;
      min-height: 250px;
      height: 100%;
    }
    .flip-card-inner {
      position: relative;
      width: 100%;
      min-height: 250px;
      height: 100%;
      transition: transform 0.65s cubic-bezier(0.4, 0, 0.2, 1);
      transform-style: preserve-3d;
    }
    .flip-card-inner.is-flipped {
      transform: rotateY(180deg);
    }
    .flip-face {
      position: absolute;
      inset: 0;
      backface-visibility: hidden;
      -webkit-backface-visibility: hidden;
      border-radius: 20px;
      border: 2.5px solid #0f172a;
      box-shadow: 4px 4px 0px #0f172a;
      padding: 20px;
      display: flex;
      flex-direction: column;
      justify-content: space-between;
    }
    .flip-face-front {
      background: #fefce8;
      color: #0f172a;
      z-index: 2;
      pointer-events: auto;
    }
    .flip-face-back {
      background: #fef08a;
      color: #0f172a;
      transform: rotateY(180deg);
      z-index: 1;
      pointer-events: none;
    }
    .flip-card-inner.is-flipped .flip-face-front {
      pointer-events: none;
      z-index: 1;
    }
    .flip-card-inner.is-flipped .flip-face-back {
      pointer-events: auto;
      z-index: 3;
    }

    /* ================= 10. RESPONSIVE RULES (MOBILE ONLY <= 767px) ================= */
    @media (max-width: 767px) {
      /* Prevent horizontal scrolling & viewport leak on mobile only */
      html, body {
        overflow-x: hidden !important;
        max-width: 100% !important;
        width: 100% !important;
      }

      /* iOS Safari input auto-zoom prevention (must be at least 16px) */
      input[type="text"],
      input[type="email"],
      textarea,
      select {
        font-size: 16px !important;
      }

      /* Loader adjustments */
      .ld-logo-wrap {
        width: 66px !important;
        height: 66px !important;
      }
      .ld-title {
        font-size: clamp(1.2rem, 5.4vw, 1.85rem) !important;
        letter-spacing: 0.1em !important;
      }
      .ld-sub {
        font-size: 0.65rem !important;
        letter-spacing: 0.22em !important;
      }
      .ld-progress-wrap {
        width: min(240px, 80vw) !important;
      }
      #skip {
        top: 14px !important;
        right: 14px !important;
        padding: 5px 12px !important;
        font-size: 0.72rem !important;
      }

      /* Ocean Top Navbar */
      .ocean-nav-inner {
        padding: 8px 12px !important;
      }
      #menu {
        display: none !important;
      }

      /* Hero Section Mobile Optimization */
      #hero {
        padding-top: 6px !important;
        min-height: calc(100vh - 56px);
      }
      #hero > div.relative.z-30.flex-1 {
        padding-top: 4.25rem !important;
        padding-bottom: 1rem !important;
      }
      .hero-waves-container {
        top: 22% !important;
        height: 65px !important;
      }
      .physics-letter {
        font-size: clamp(1.85rem, 7.5vw, 2.75rem) !important;
        padding: 0 1.5px !important;
        text-shadow: 0 2px 0 #0284c7, 0 4px 0 #0369a1, 0 6px 12px rgba(2, 44, 76, 0.4) !important;
      }
      #hero p.max-w-xl {
        font-size: 12px !important;
        line-height: 1.45 !important;
        margin-top: 0.5rem !important;
        margin-bottom: 1rem !important;
        padding: 0 10px;
      }
      #hero .flex.flex-wrap.items-center.justify-center.gap-3\.5 {
        gap: 8px !important;
      }
      #hero .flex.flex-wrap.items-center.justify-center.gap-3\.5 .nb-btn {
        padding: 8px 13px !important;
        font-size: 12px !important;
      }
      #duck {
        width: 44px !important;
        height: 40px !important;
      }
      #sailboatProp {
        display: none !important; /* Keep mobile sky clean */
      }
      #gullFlight {
        width: 44px !important;
        height: 32px !important;
      }
      #gullSvg {
        width: 44px !important;
        height: 32px !important;
      }

      /* Beach Illustrations at the bottom of Hero */
      #heroVolleyNet {
        transform: translateX(-50%) scale(0.55) !important;
        transform-origin: center bottom;
        top: auto !important;
        bottom: 22px !important;
      }
      #heroPalmTree {
        transform: scale(0.55) !important;
        transform-origin: bottom left;
        left: -8px !important;
        bottom: 0px !important;
      }
      #crab {
        width: 44px !important;
        height: 36px !important;
        bottom: 4px !important;
        left: 0px !important;
        z-index: 30 !important;
      }
      #heroLoungeArea {
        transform: scale(0.55) !important;
        transform-origin: bottom right;
        right: -6px !important;
        bottom: 2px !important;
      }

      /* All Content Cards: stack strictly above background decorations */
      .nb-card,
      .nb-card-sm,
      .polaroid-card,
      .stack-layer-card,
      #skillTabBar,
      #flagshipCardStage,
      #idxDetailCard,
      .timeline-container,
      .flip-scene {
        position: relative !important;
        z-index: 10 !important;
      }

      /* Hide crowded beach decorations that collide with cards on mobile */
      #sandCastleProp {
        display: none !important;
      }

      /* Milestone Section Mobile Optimization */
      #milestone {
        background: #036194 !important;
        padding-bottom: 2.5rem !important;
      }
      #milestone .w-full.overflow-hidden.leading-none.relative.z-10 {
        display: block !important;
      }
      #milestone .w-full.overflow-hidden.leading-none.relative.z-10 svg {
        height: 44px !important;
      }
      #milestone > .max-w-4xl {
        padding-left: 12px !important;
        padding-right: 12px !important;
        padding-top: 0.5rem !important;
      }
      #milestone .nb-card:first-child {
        padding: 16px 14px !important;
        margin-bottom: 1.25rem !important;
        border-radius: 16px !important;
      }
      #milestone .nb-card:first-child h2 {
        font-size: 1.35rem !important;
        line-height: 1.25 !important;
        margin-bottom: 4px !important;
      }
      #milestone .nb-card:first-child p {
        font-size: 11.5px !important;
        line-height: 1.45 !important;
      }
      #milestoneTimeline {
        gap: 1.25rem !important;
      }
      #milestoneTimeline .timeline-spine-track {
        left: 16px !important;
        width: 4px !important;
      }
      #milestoneTimeline .timeline-node-item {
        gap: 10px !important;
      }
      #milestoneTimeline .node-circle {
        width: 32px !important;
        height: 32px !important;
        min-width: 32px !important;
        font-size: 14px !important;
        border-width: 2px !important;
        box-shadow: 2px 2px 0px #0f172a !important;
      }
      #milestoneTimeline .nb-card {
        padding: 14px 14px !important;
        border-radius: 16px !important;
        border-width: 2px !important;
        box-shadow: 3px 3px 0px #0f172a !important;
      }
      #milestoneTimeline .nb-card h3 {
        font-size: 14.5px !important;
        line-height: 1.35 !important;
        margin-bottom: 3px !important;
        word-break: break-word !important;
      }
      #milestoneTimeline .nb-card .font-mono-code.text-sky-600 {
        font-size: 11px !important;
        margin-bottom: 8px !important;
      }
      #milestoneTimeline .nb-card p {
        font-size: 11.5px !important;
        line-height: 1.45 !important;
        margin-bottom: 10px !important;
      }
      #milestoneTimeline .nb-card .flex.flex-wrap.items-center.justify-between {
        gap: 6px !important;
        margin-bottom: 8px !important;
      }
      #milestoneTimeline .nb-card span.font-mono-code {
        font-size: 9.5px !important;
        padding: 2.5px 7px !important;
      }
      #milestoneTimeline .nb-card .bg-slate-50 {
        padding: 10px 10px !important;
        margin-bottom: 10px !important;
        border-radius: 10px !important;
      }
      #milestoneTimeline .nb-card .bg-slate-50 .grid {
        gap: 6px !important;
      }
      #milestoneTimeline .nb-card .bg-slate-50 .text-xs {
        font-size: 11px !important;
        line-height: 1.35 !important;
      }
      #milestoneTimeline .nb-card .flex-wrap.gap-1\.5 span {
        font-size: 10px !important;
        padding: 2px 7px !important;
      }

      /* Kontak Section Mobile Optimization */
      #kontak {
        background: #036194 !important;
        padding-top: 2rem !important;
        padding-bottom: 0 !important;
      }
      #kontak > .max-w-4xl {
        padding-left: 12px !important;
        padding-right: 12px !important;
      }
      #kontak > .max-w-4xl > .nb-card:first-child {
        padding: 16px 14px !important;
        border-radius: 18px !important;
        border-width: 2px !important;
        box-shadow: 4px 4px 0px #0f172a !important;
        margin-bottom: 1.25rem !important;
      }
      #kontak h2 {
        font-size: 1.35rem !important;
        line-height: 1.25 !important;
        margin-top: 6px !important;
        margin-bottom: 6px !important;
      }
      #kontak p.text-xs.md\:text-sm {
        font-size: 11.5px !important;
        line-height: 1.45 !important;
        padding-bottom: 8px !important;
        margin-bottom: 10px !important;
      }
      #kontak .grid.grid-cols-1.md\:grid-cols-2 {
        gap: 12px !important;
      }
      #kontak .bg-\[\#fefce8\] {
        padding: 14px 12px !important;
        border-radius: 14px !important;
        border-width: 2px !important;
        box-shadow: 3px 3px 0px #0f172a !important;
      }
      #contactTopics {
        gap: 6px !important;
        margin-bottom: 14px !important;
      }
      .topic-pill-btn {
        padding: 5px 9px !important;
        font-size: 11px !important;
        border-width: 1.5px !important;
      }
      #sendEmailCta {
        padding: 10px 14px !important;
        font-size: 13px !important;
      }
      #copyEmailCardBtn {
        padding: 8px 12px !important;
        font-size: 11px !important;
      }
      #cardEmailText {
        font-size: 11px !important;
        max-width: 180px;
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: nowrap;
      }
      #kontak .flip-scene,
      #kontak .flip-card-inner {
        min-height: 275px !important;
      }
      #kontak .flip-face {
        padding: 14px 12px !important;
        border-radius: 14px !important;
        border-width: 2px !important;
        box-shadow: 3px 3px 0px #0f172a !important;
      }
      #kontak .flip-face .px-4.py-3 {
        padding: 8px 10px !important;
        margin-bottom: 8px !important;
      }
      #wibClockDisplay {
        font-size: 15px !important;
      }
      .animate-submarine {
        transform: scale(0.62) !important;
        transform-origin: top right !important;
        top: 12px !important;
        right: 8px !important;
      }
      .animate-angler {
        display: none !important;
      }
      #kontak > .max-w-4xl > .nb-card.px-6.py-4 {
        padding: 12px 14px !important;
        border-radius: 14px !important;
        flex-direction: column !important;
        align-items: center !important;
        text-align: center !important;
        gap: 8px !important;
      }

      /* Profile section */
      .polaroid-card {
        max-width: 290px;
        margin: 0 auto;
      }
      #skillTabBar {
        padding: 4px !important;
        gap: 4px !important;
      }
      .skill-tab-btn {
        padding: 6px 4px !important;
      }
      .skill-tab-btn span:last-child {
        font-size: 10px !important;
      }

      /* Studi Kasus & Flagship Stage */
      #flagshipScrollTrack {
        height: auto !important;
      }
      #flagshipScrollTrack > .sticky {
        position: relative !important;
        top: auto !important;
        min-height: auto !important;
        padding-top: 10px;
      }
      #flagshipCardStage {
        gap: 14px !important;
      }
      #fpBrowserCard {
        transform: none !important;
      }
      #fpArtworkBox {
        min-height: 200px !important;
      }

      /* Tech Stack */
      .stack-layer-card {
        padding: 16px !important;
      }

      /* Modal */
      #caseStudyModal {
        padding: 8px !important;
      }
      #caseStudyModal .nb-card {
        max-height: 94vh !important;
        border-radius: 16px !important;
      }
    }

    @media (max-width: 380px) {
      .physics-letter {
        font-size: clamp(1.6rem, 6.8vw, 2.1rem) !important;
        padding: 0 1px !important;
      }
      .nb-btn {
        padding-left: 10px !important;
        padding-right: 10px !important;
      }
    }
  </style>
</head>
<body>

  <!-- ================= 1. SPLASH LOADER & 3-LAYER WAVE CURTAIN ================= -->
  <div id="loader" title="Klik untuk lewati">
    <!-- Ombak Naik dari Bawah ke Atas (Intro Ocean Rise) -->
    <div id="loaderWaterRise" class="ld-water-rise" aria-hidden="true">
      <div class="ld-water-crest">
        <svg viewBox="0 0 1440 70" preserveAspectRatio="none">
          <path fill="#38bdf8" opacity="0.85" stroke="#ffffff" stroke-width="3.5" d="M0,35 C320,70 600,10 920,45 C1160,70 1340,20 1440,35 L1440,70 L0,70 Z"></path>
          <path fill="#0284c7" stroke="#ffffff" stroke-width="4" d="M0,45 C380,10 700,65 1060,30 C1240,10 1360,50 1440,45 L1440,70 L0,70 Z"></path>
        </svg>
      </div>
    </div>

    <!-- Gelembung Udara Mengapung (Bubbles) -->
    <div id="loaderBubbles" class="ld-bubbles" aria-hidden="true"></div>

    <!-- Tombol Lewati -->
    <button id="skip" type="button">Lewati</button>

    <!-- Konten Tengah: Logo Luffy Buoy, Nama Pop Up, Role, & Loading Bar -->
    <div class="ld-box" id="loaderBox">
      <div class="ld-logo-wrap" id="loaderLogoWrap">
        <img src="{{ asset('images/logo.jpg') }}?v=kidluffy" alt="{{ $profile->name }}" onerror="this.onerror=null;this.src='/images/logo.jpg';" />
      </div>
      <h1 class="ld-title" id="loaderTitle">
        @php
          $nameParts = explode(' ', trim($profile->name));
        @endphp
        @if(count($nameParts) >= 2)
          <span>{{ $nameParts[0] }}</span>
          <span>{{ implode(' ', array_slice($nameParts, 1)) }}</span>
        @else
          <span>{{ $profile->name }}</span>
        @endif
      </h1>
      <div class="ld-sub" id="loaderSub">{{ strtoupper($profile->title ?? 'Web Developer') }}</div>
      <div class="ld-progress-wrap" id="loaderProgressWrap">
        <span class="ld-bar"><b id="loaderBarFill"></b></span>
      </div>
    </div>
  </div>

  <!-- ================= TSUNAMI WAVE OVERLAY (FLOOD BEACH: 60FPS GPU SMOOTH RIGHTWARD WAVE) ================= -->
  <div id="tsunamiWaveOverlay" class="flood-tsunami" aria-hidden="true">
    <!-- Trailing Left Wave Edge -->
    <svg viewBox="0 0 100 800" class="h-full w-20 shrink-0 -mr-1" preserveAspectRatio="none">
      <path fill="#0369a1" d="M100,0 L52,0 C82,130 24,260 56,400 C88,540 28,670 52,800 L100,800 Z"></path>
    </svg>
    <!-- Main Ocean Gradient Body -->
    <div class="flex-1 h-full" style="background: linear-gradient(90deg, #0369a1 0%, #0284c7 55%, #0ea5e9 84%, #38bdf8 100%);"></div>
    <!-- Leading Right Smooth Sinusoidal Foam Crest -->
    <svg viewBox="0 0 200 800" class="h-full w-44 shrink-0 -ml-1" preserveAspectRatio="none">
      <path fill="#38bdf8" d="M0,0 L86,0 C150,120 48,250 116,400 C176,550 54,680 110,800 L0,800 Z"></path>
      <path fill="#bae6fd" opacity="0.65" d="M0,0 L68,0 C130,120 32,250 98,400 C156,550 38,680 92,800 L0,800 Z"></path>
      <path fill="#ffffff" d="M50,0 L76,0 C138,120 40,250 106,400 C164,550 46,680 100,800 L74,800 C22,680 138,550 82,400 C18,250 114,120 50,0 Z"></path>
      <circle cx="136" cy="150" r="12" fill="#ffffff" opacity="0.9"/>
      <circle cx="148" cy="390" r="10" fill="#ffffff" opacity="0.85"/>
      <circle cx="132" cy="630" r="13" fill="#ffffff" opacity="0.9"/>
    </svg>
  </div>

  <!-- ================= FULLSCREEN REBUILD BEACH OVERLAY (1:1 REFERENCE: FLUFFY CLOUDS, NO BOX BORDER!) ================= -->
  <div id="rebuildOverlay" aria-hidden="true">
    <!-- Surrounding Fluffy Drifting Clouds -->
    <svg class="cloud-drifter" style="width: 280px; top: 8%; left: 6%;" viewBox="0 0 280 150" fill="none">
      <path d="M58 128h168c24 0 42-17 42-39 0-20-15-36-35-38-6-26-30-45-58-45-23 0-43 13-53 33-7-4-15-6-24-6-24 0-43 18-45 41-19 4-33 20-33 39 0 22 17 15 38 15z" fill="#ffffff"/>
      <path d="M40 120c10 6 24 8 40 8h146c20 0 36-11 40-26-8 10-21 16-36 16H76c-15 0-28-4-36-10v12z" fill="#e0f2fe"/>
    </svg>
    <svg class="cloud-drifter" style="width: 300px; top: 10%; right: 5%; animation-delay: 0.7s;" viewBox="0 0 280 150" fill="none">
      <path d="M58 128h168c24 0 42-17 42-39 0-20-15-36-35-38-6-26-30-45-58-45-23 0-43 13-53 33-7-4-15-6-24-6-24 0-43 18-45 41-19 4-33 20-33 39 0 22 17 15 38 15z" fill="#ffffff"/>
      <path d="M40 120c10 6 24 8 40 8h146c20 0 36-11 40-26-8 10-21 16-36 16H76c-15 0-28-4-36-10v12z" fill="#e0f2fe"/>
    </svg>
    <svg class="cloud-drifter" style="width: 260px; bottom: 8%; left: 8%; animation-delay: 0.4s;" viewBox="0 0 280 150" fill="none">
      <path d="M58 128h168c24 0 42-17 42-39 0-20-15-36-35-38-6-26-30-45-58-45-23 0-43 13-53 33-7-4-15-6-24-6-24 0-43 18-45 41-19 4-33 20-33 39 0 22 17 15 38 15z" fill="#ffffff"/>
      <path d="M40 120c10 6 24 8 40 8h146c20 0 36-11 40-26-8 10-21 16-36 16H76c-15 0-28-4-36-10v12z" fill="#e0f2fe"/>
    </svg>
    <svg class="cloud-drifter" style="width: 290px; bottom: 7%; right: 7%; animation-delay: 1.0s;" viewBox="0 0 280 150" fill="none">
      <path d="M58 128h168c24 0 42-17 42-39 0-20-15-36-35-38-6-26-30-45-58-45-23 0-43 13-53 33-7-4-15-6-24-6-24 0-43 18-45 41-19 4-33 20-33 39 0 22 17 15 38 15z" fill="#ffffff"/>
      <path d="M40 120c10 6 24 8 40 8h146c20 0 36-11 40-26-8 10-21 16-36 16H76c-15 0-28-4-36-10v12z" fill="#e0f2fe"/>
    </svg>

    <!-- Main Center Giant Fluffy Cloud Silhouette Behind Tools & Text -->
    <div class="absolute inset-0 pointer-events-none flex items-center justify-center px-4">
      <svg class="cloud-cluster w-[94vw] max-w-[780px] h-auto" viewBox="0 0 780 460" fill="none">
        <path d="M165 395h455c72 0 125-50 125-115 0-58-44-106-101-114C626 88 556 32 472 32c-54 0-103 24-136 63-25-24-60-39-99-39-78 0-141 61-145 138-55 13-95 62-95 121 0 68 54 80 168 80z" fill="#ffffff"/>
        <path d="M92 365c28 20 68 30 116 30h412c62 0 110-34 122-82-22 32-62 52-112 52H196c-46 0-82-12-104-28v28z" fill="#e0f2fe"/>
      </svg>
    </div>

    <!-- Center Content Directly on the Cloud (No Rectangular Card Box!) -->
    <div class="relative z-10 flex flex-col items-center text-center px-6">
      <div class="flex items-center justify-center gap-3.5 mb-2">
        <!-- Left Orange Box: Pliers/Pincer -->
        <div class="w-16 h-16 rounded-2xl bg-[#f59e0b] border-[3px] border-slate-900 shadow-[4px_4px_0px_#0f172a] flex items-center justify-center anim-tool-left">
          <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="#ffffff" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
            <path d="M14.7 6.3a1 1 0 0 0 0 1.4l1.6 1.6a1 1 0 0 0 1.4 0l3.77-3.77a6 6 0 0 1-7.94 7.94l-6.91 6.91a2.12 2.12 0 0 1-3-3l6.91-6.91a6 6 0 0 1 7.94-7.94l-3.76 3.76z"/>
          </svg>
        </div>

        <!-- Center Dark Navy Box: Yellow Construction Hardhat -->
        <div class="w-20 h-20 rounded-2xl bg-[#0f172a] border-[3px] border-slate-900 shadow-[5px_5px_0px_#0f172a] flex items-center justify-center anim-tool-center">
          <svg width="42" height="42" viewBox="0 0 24 24" fill="none" stroke="#facc15" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
            <path d="M2 18a1 1 0 0 0 1 1h18a1 1 0 0 0 1-1v-2a1 1 0 0 0-1-1H3a1 1 0 0 0-1 1v2z"/>
            <path d="M10 10V5a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v5"/>
            <path d="M4 15v-3a6 6 0 0 1 6-6h0"/>
            <path d="M14 6h0a6 6 0 0 1 6 6v3"/>
          </svg>
        </div>

        <!-- Right Ocean Blue Box: Wrench -->
        <div class="w-16 h-16 rounded-2xl bg-[#0284c7] border-[3px] border-slate-900 shadow-[4px_4px_0px_#0f172a] flex items-center justify-center anim-tool-right">
          <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="#ffffff" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
            <path d="M14.7 6.3a1 1 0 0 0 0 1.4l1.6 1.6a1 1 0 0 0 1.4 0l3.77-3.77a6 6 0 0 1-7.94 7.94l-6.91 6.91a2.12 2.12 0 0 1-3-3l6.91-6.91a6 6 0 0 1 7.94-7.94l-3.76 3.76z"/>
          </svg>
        </div>
      </div>

      <!-- Dynamic Sound Badge: 🔨 KLANG! -> ⚡ TWING! -> 🔧 CRANK! -->
      <div id="rebuildSoundBadge" class="px-3.5 py-1 rounded-full bg-[#fef08a] border-2 border-slate-900 text-slate-900 font-mono-code text-[11px] font-extrabold shadow-[2px_2px_0px_#0f172a] mb-4">
        🔨 KLANG!
      </div>

      <h3 class="text-2xl md:text-3xl font-extrabold text-slate-900 mb-5 tracking-tight">Sedang Membangun Ulang Pantai...</h3>

      <div class="w-72 sm:w-80 h-2.5 bg-slate-200 rounded-full overflow-hidden mb-2.5">
        <div id="rebuildBar" class="h-full bg-gradient-to-r from-sky-600 via-sky-400 to-amber-300 rounded-full transition-all duration-75" style="width: 0%"></div>
      </div>
      <div class="w-72 sm:w-80 flex justify-between font-mono-code text-[10px] font-extrabold tracking-wider">
        <span class="text-slate-400">RECONSTRUCTION PROGRESS</span>
        <span id="rebuildPercentText" class="text-sky-700">0%</span>
      </div>
    </div>
  </div>

  <!-- ================= 2. FULL-WIDTH GLASS OCEAN NAVBAR ================= -->
  <nav class="ocean-nav" id="mainNav">
    <div class="ocean-nav-inner">
      <a href="#hero" data-go="hero" class="brand-link flex items-center gap-2.5 sm:gap-3 no-underline outline-none focus:outline-none focus:ring-0 select-none border-0 ring-0">
        <div class="w-8 h-8 sm:w-9 sm:h-9 rounded-full bg-white border-2 border-white overflow-hidden flex items-center justify-center shadow-[2px_2px_0px_rgba(15,23,42,0.45)] flex-shrink-0">
          <img src="{{ asset('images/logo.jpg') }}?v=kidluffy" alt="{{ $profile->name }}" class="w-full h-full object-cover" onerror="this.onerror=null;this.src='/images/logo.jpg';" />
        </div>
        <div class="leading-tight">
          <div class="text-white font-extrabold text-xs sm:text-sm tracking-tight truncate max-w-[125px] sm:max-w-none">{{ $profile->name }}</div>
          <div class="font-mono-code text-[9px] sm:text-[10px] text-sky-100/85 font-semibold tracking-wide">&gt;_ {{ $profile->short_title ?? $profile->role }}</div>
        </div>
      </a>

      <div id="menu" class="hidden md:flex">
        <div class="nav-glider" id="navGlider"></div>
        <a href="#profil" data-go="profil" class="nav-pill-link active">Profil</a>
        <a href="#studi-kasus" data-go="studi-kasus" class="nav-pill-link">Studi Kasus</a>
        <a href="#tech-stack" data-go="tech-stack" class="nav-pill-link">Tech Stack</a>
        <a href="#milestone" data-go="milestone" class="nav-pill-link">Milestone</a>
        <a href="#kontak" data-go="kontak" class="nav-pill-link">Kontak</a>
      </div>

      <div class="flex items-center gap-2">
        <button id="copyMail" type="button" data-mail="{{ $profile->email }}" class="px-3 sm:px-4 py-1.5 rounded-full bg-white/12 backdrop-blur-md border border-white/28 text-white font-mono-code text-xs font-semibold flex items-center gap-1.5 sm:gap-2 hover:bg-white/22 transition cursor-pointer flex-shrink-0">
          <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round" class="opacity-90 shrink-0">
            <rect x="9" y="9" width="13" height="13" rx="2" ry="2"></rect>
            <path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"></path>
          </svg>
          <span id="navEmailText" class="hidden sm:inline">{{ $profile->email }}</span>
          <span class="inline sm:hidden font-mono-code font-bold">Email</span>
        </button>

        <!-- Mobile Hamburger Menu Button (< 768px only) -->
        <button id="mobileMenuBtn" type="button" aria-label="Menu navigasi mobile" class="md:hidden w-8 h-8 sm:w-9 sm:h-9 rounded-full bg-white/15 backdrop-blur-md border border-white/30 text-white flex items-center justify-center hover:bg-white/25 active:scale-95 transition cursor-pointer flex-shrink-0">
          <svg id="hamburgerIcon" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
            <line x1="4" y1="6" x2="20" y2="6"></line>
            <line x1="4" y1="12" x2="20" y2="12"></line>
            <line x1="4" y1="18" x2="20" y2="18"></line>
          </svg>
          <svg id="closeIcon" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round" class="hidden">
            <line x1="18" y1="6" x2="6" y2="18"></line>
            <line x1="6" y1="6" x2="18" y2="18"></line>
          </svg>
        </button>
      </div>
    </div>

    <!-- Mobile Navigation Drawer / Dropdown (< 768px only) -->
    <div id="mobileMenuDrawer" class="md:hidden hidden px-3 pb-3 pt-1">
      <div class="bg-sky-950/95 backdrop-blur-xl border-2 border-sky-400/40 rounded-2xl p-2.5 shadow-2xl flex flex-col gap-1">
        <a href="#profil" data-go="profil" class="mobile-nav-link flex items-center justify-between px-3.5 py-2.5 rounded-xl text-white font-bold text-xs hover:bg-white/15 active:bg-amber-400 active:text-slate-900 transition">
          <span class="flex items-center gap-2.5">👤 Profil</span>
          <span class="text-sky-300 font-mono-code text-xs">&gt;</span>
        </a>
        <a href="#studi-kasus" data-go="studi-kasus" class="mobile-nav-link flex items-center justify-between px-3.5 py-2.5 rounded-xl text-white font-bold text-xs hover:bg-white/15 active:bg-amber-400 active:text-slate-900 transition">
          <span class="flex items-center gap-2.5">🚀 Studi Kasus</span>
          <span class="text-sky-300 font-mono-code text-xs">&gt;</span>
        </a>
        <a href="#tech-stack" data-go="tech-stack" class="mobile-nav-link flex items-center justify-between px-3.5 py-2.5 rounded-xl text-white font-bold text-xs hover:bg-white/15 active:bg-amber-400 active:text-slate-900 transition">
          <span class="flex items-center gap-2.5">🛠️ Tech Stack</span>
          <span class="text-sky-300 font-mono-code text-xs">&gt;</span>
        </a>
        <a href="#milestone" data-go="milestone" class="mobile-nav-link flex items-center justify-between px-3.5 py-2.5 rounded-xl text-white font-bold text-xs hover:bg-white/15 active:bg-amber-400 active:text-slate-900 transition">
          <span class="flex items-center gap-2.5">🏆 Milestone</span>
          <span class="text-sky-300 font-mono-code text-xs">&gt;</span>
        </a>
        <a href="#kontak" data-go="kontak" class="mobile-nav-link flex items-center justify-between px-3.5 py-2.5 rounded-xl text-white font-bold text-xs hover:bg-white/15 active:bg-amber-400 active:text-slate-900 transition">
          <span class="flex items-center gap-2.5">✉️ Kontak</span>
          <span class="text-sky-300 font-mono-code text-xs">&gt;</span>
        </a>
      </div>
    </div>
    </div>
  </nav>

  <main>
    <!-- ================= 3. HERO SECTION ================= -->
    <section id="hero">
      <div class="hero-waves-container" aria-hidden="true">
        <div class="hero-wave-line line-1"></div>
        <div class="hero-wave-line line-2"></div>
        <div class="hero-wave-line line-3"></div>
      </div>

      <!-- Flying Seagull Sprite with 3-State Flapping Wings & Speech Bubble -->
      <div id="gullFlight" title="Klik burung camar!">
        <svg id="gullSvg" viewBox="0 0 64 48" class="w-[64px] h-[48px] overflow-visible drop-shadow-[2px_3px_0px_#0f172a]" draggable="false">
          <!-- Back Wings (Behind Body) -->
          <g class="gull-wing-up-back">
            <path d="M26 21 C20 12 12 3 4 2 C8 12 18 18 26 23 Z" fill="#cbd5e1" stroke="#0b2a45" stroke-width="2.5" stroke-linejoin="round"/>
            <path d="M4 2 C8 7 11 11 13 13" stroke="#0b2a45" stroke-width="2"/>
          </g>
          <g class="gull-wing-mid-back">
            <path d="M26 22 C18 19 10 18 2 20 C10 24 18 25 26 24 Z" fill="#cbd5e1" stroke="#0b2a45" stroke-width="2.5" stroke-linejoin="round"/>
            <path d="M2 20 C6 21 10 22 14 23" stroke="#0b2a45" stroke-width="2"/>
          </g>
          <g class="gull-wing-down-back">
            <path d="M26 23 C20 30 12 39 4 43 C8 35 18 27 26 23 Z" fill="#cbd5e1" stroke="#0b2a45" stroke-width="2.5" stroke-linejoin="round"/>
            <path d="M4 43 C8 37 11 33 13 31" stroke="#0b2a45" stroke-width="2"/>
          </g>

          <!-- Core Body, Tail, Head, Beak, Eye -->
          <g class="gull-core">
            <ellipse cx="32" cy="24" rx="16" ry="8" fill="#ffffff" stroke="#0b2a45" stroke-width="2.8"/>
            <path d="M16 25 L8 28 L14 22 Z" fill="#cbd5e1" stroke="#0b2a45" stroke-width="2.5" stroke-linejoin="round"/>
            <circle cx="44" cy="20" r="7" fill="#ffffff" stroke="#0b2a45" stroke-width="2.8"/>
            <path d="M50 20 L58 22 L50 24 Z" fill="#ffd84d" stroke="#0b2a45" stroke-width="2" stroke-linejoin="round"/>
            <circle cx="53" cy="22" r="1" fill="#ff7828"/>
            <circle cx="45" cy="18" r="1.8" fill="#0b2a45"/>
          </g>

          <!-- Front Wings (In Front of Body) -->
          <g class="gull-wing-up-front">
            <path d="M28 22 C32 10 42 2 52 1 C44 12 38 18 30 25 Z" fill="#ffffff" stroke="#0b2a45" stroke-width="2.8" stroke-linejoin="round"/>
            <path d="M48 3 C44 8 40 13 36 17" stroke="#0b2a45" stroke-width="2"/>
          </g>
          <g class="gull-wing-mid-front">
            <path d="M28 23 C38 21 48 20 56 22 C48 26 38 27 28 25 Z" fill="#ffffff" stroke="#0b2a45" stroke-width="2.8" stroke-linejoin="round"/>
            <path d="M52 22 C46 23 40 24 34 25" stroke="#0b2a45" stroke-width="2"/>
          </g>
          <g class="gull-wing-down-front">
            <path d="M28 24 C32 34 42 43 50 46 C44 36 38 28 30 24 Z" fill="#ffffff" stroke="#0b2a45" stroke-width="2.8" stroke-linejoin="round"/>
            <path d="M46 44 C42 38 38 32 35 27" stroke="#0b2a45" stroke-width="2"/>
          </g>
        </svg>
      </div>

      <!-- Sailboat on Left Water Horizon -->
      <div id="sailboatProp" class="absolute top-[36%] left-[10%] z-20 cursor-pointer animate-boat" title="Klik perahu!">
        <svg width="60" height="60" viewBox="0 0 64 64">
          <polygon points="32,8 32,42 12,42" fill="#ffffff" stroke="#0f172a" stroke-width="2.5"/>
          <polygon points="35,14 35,42 52,42" fill="#e0f2fe" stroke="#0f172a" stroke-width="2.5"/>
          <polygon points="8,44 56,44 48,54 16,54" fill="#f97316" stroke="#0f172a" stroke-width="2.5"/>
        </svg>
      </div>

      <!-- Interactive Swimming & Draggable Rubber Duck Sprite -->
      <div id="duck" class="absolute top-0 left-0 w-[72px] h-[64px] z-40 cursor-grab select-none" style="touch-action: none;">
        <img src="/images/sprites/duck.svg" alt="Bebek karet" class="w-full h-full pointer-events-none drop-shadow-[3px_4px_0px_#0f172a]" draggable="false" onerror="this.outerHTML='<span class=\'text-5xl\'>🦆</span>'" />
      </div>

      <!-- Center Hero Content: 2-Row Physics Title + Subtitle + 3 CTA Buttons -->
      <div class="relative z-30 flex-1 flex flex-col items-center justify-center pt-28 pb-6 px-4">
        <div class="relative inline-block">
          @php
            $nameWords = explode(' ', trim($profile->name));
            $firstWord = strtoupper($nameWords[0] ?? 'ARTA');
            $secondWord = strtoupper(implode(' ', array_slice($nameWords, 1)) ?: 'MAULANA');
          @endphp
          <h1 id="title" class="flex flex-col items-center justify-center select-none my-1">
            <div class="flex items-center justify-center gap-1.5 sm:gap-3 md:gap-5 mb-1 whitespace-nowrap">
              @foreach(str_split($firstWord) as $char)
                <span class="physics-letter" data-letter="{{ $char }}">{{ $char }}</span>
              @endforeach
            </div>
            <div class="flex items-center justify-center gap-1 sm:gap-2.5 md:gap-4 whitespace-nowrap">
              @foreach(str_split(str_replace(' ', '', $secondWord)) as $char)
                <span class="physics-letter" data-letter="{{ $char }}">{{ $char }}</span>
              @endforeach
            </div>
          </h1>
        </div>

        <p class="text-white text-center text-sm md:text-base font-semibold max-w-xl mt-4 mb-6 drop-shadow-[0_2px_6px_rgba(3,105,161,0.85)]">
          {{ $profile->role }}. {{ $profile->tagline ?? $profile->headline }}
        </p>

        <div class="flex flex-wrap items-center justify-center gap-3.5 relative z-30">
          <a href="#studi-kasus" data-go="studi-kasus" class="nb-btn px-5 py-2.5 text-sm" style="background:#0284c7; color:#ffffff;">
            <span>↓</span> <span>Lihat Proyek</span>
          </a>
          <a href="{{ asset($profile->cv_path ?? 'cv.pdf') }}" download class="nb-btn px-5 py-2.5 text-sm" style="background:#0f172a; color:#ffffff;">
            <span>📄</span> <span>Download CV</span>
          </a>
          <a href="{{ $profile->github ?? 'https://github.com' }}" target="_blank" rel="noopener" class="nb-btn px-5 py-2.5 text-sm" style="background:#0f172a; color:#ffffff;">
            <span>GitHub</span> <span>↗</span>
          </a>
        </div>
      </div>

      <!-- Curved Sandy Beach Shoreline with Seamless Gradient into Profil -->
      <div class="relative w-full h-44 md:h-48 pointer-events-none -mb-1 z-10">
        <svg viewBox="0 0 1440 180" class="w-full h-full block" preserveAspectRatio="none">
          <path fill="#fde68a" stroke="#ffffff" stroke-width="6" d="M0,45 C360,105 1080,-5 1440,48 L1440,180 L0,180 Z"></path>
          <path fill="#fef9c3" d="M0,78 C420,125 1020,30 1440,80 L1440,180 L0,180 Z"></path>
        </svg>

        <!-- Lapangan Voli Pantai & Net (Neubrutalist Beach Volleyball Court) -->
        <div id="heroVolleyNet" class="absolute top-5 sm:top-7 md:top-8 left-1/2 -translate-x-1/2 pointer-events-auto select-none">
          <svg width="240" height="85" viewBox="0 0 240 85" class="drop-shadow-[2px_3px_0px_rgba(15,23,42,0.18)]">
            <!-- Sand Pitch Ground & Perspective Boundary Lines -->
            <polygon points="20,52 220,52 198,82 42,82" fill="#fef08a" stroke="#d97706" stroke-width="2" stroke-dasharray="6 4" opacity="0.7"/>
            <line x1="120" y1="52" x2="120" y2="82" stroke="#d97706" stroke-width="1.8" stroke-dasharray="4 3" opacity="0.6"/>

            <!-- Left Pole & Guy-wire -->
            <line x1="38" y1="18" x2="16" y2="62" stroke="#0f172a" stroke-width="2.2" stroke-linecap="round"/>
            <circle cx="16" cy="62" r="2.5" fill="#d97706" stroke="#0f172a" stroke-width="1.8"/>
            <rect x="36" y="12" width="5.5" height="52" rx="2" fill="#f8fafc" stroke="#0f172a" stroke-width="2.4"/>
            <rect x="35" y="10" width="7.5" height="4" rx="1" fill="#0284c7" stroke="#0f172a" stroke-width="1.8"/>

            <!-- Right Pole & Guy-wire -->
            <line x1="202" y1="18" x2="224" y2="62" stroke="#0f172a" stroke-width="2.2" stroke-linecap="round"/>
            <circle cx="224" cy="62" r="2.5" fill="#d97706" stroke="#0f172a" stroke-width="1.8"/>
            <rect x="198" y="12" width="5.5" height="52" rx="2" fill="#f8fafc" stroke="#0f172a" stroke-width="2.4"/>
            <rect x="197" y="10" width="7.5" height="4" rx="1" fill="#0284c7" stroke="#0f172a" stroke-width="1.8"/>

            <!-- Net Body & Mesh -->
            <rect x="41.5" y="18" width="156.5" height="23" fill="#ffffff" fill-opacity="0.3" stroke="#0f172a" stroke-width="2"/>
            <!-- Top White Band -->
            <rect x="39" y="16" width="162" height="4.5" rx="1" fill="#ffffff" stroke="#0f172a" stroke-width="2"/>
            <!-- Bottom Band -->
            <line x1="41.5" y1="41" x2="198" y2="41" stroke="#ffffff" stroke-width="3"/>
            <line x1="41.5" y1="41" x2="198" y2="41" stroke="#0f172a" stroke-width="1.8"/>

            <!-- Horizontal Mesh Lines -->
            <line x1="41.5" y1="23.5" x2="198" y2="23.5" stroke="#0f172a" stroke-width="1.2" stroke-opacity="0.5"/>
            <line x1="41.5" y1="29.5" x2="198" y2="29.5" stroke="#0f172a" stroke-width="1.2" stroke-opacity="0.5"/>
            <line x1="41.5" y1="35.5" x2="198" y2="35.5" stroke="#0f172a" stroke-width="1.2" stroke-opacity="0.5"/>

            <!-- Vertical Mesh Lines -->
            <line x1="56" y1="18" x2="56" y2="41" stroke="#0f172a" stroke-width="1.2" stroke-opacity="0.5"/>
            <line x1="71" y1="18" x2="71" y2="41" stroke="#0f172a" stroke-width="1.2" stroke-opacity="0.5"/>
            <line x1="86" y1="18" x2="86" y2="41" stroke="#0f172a" stroke-width="1.2" stroke-opacity="0.5"/>
            <line x1="101" y1="18" x2="101" y2="41" stroke="#0f172a" stroke-width="1.2" stroke-opacity="0.5"/>
            <line x1="116" y1="18" x2="116" y2="41" stroke="#0f172a" stroke-width="1.2" stroke-opacity="0.5"/>
            <line x1="131" y1="18" x2="131" y2="41" stroke="#0f172a" stroke-width="1.2" stroke-opacity="0.5"/>
            <line x1="146" y1="18" x2="146" y2="41" stroke="#0f172a" stroke-width="1.2" stroke-opacity="0.5"/>
            <line x1="161" y1="18" x2="161" y2="41" stroke="#0f172a" stroke-width="1.2" stroke-opacity="0.5"/>
            <line x1="176" y1="18" x2="176" y2="41" stroke="#0f172a" stroke-width="1.2" stroke-opacity="0.5"/>
            <line x1="191" y1="18" x2="191" y2="41" stroke="#0f172a" stroke-width="1.2" stroke-opacity="0.5"/>

            <!-- Red-White Antennas -->
            <line x1="48" y1="6" x2="48" y2="41" stroke="#ef4444" stroke-width="2.2" stroke-linecap="round"/>
            <line x1="192" y1="6" x2="192" y2="41" stroke="#ef4444" stroke-width="2.2" stroke-linecap="round"/>

            <!-- Volleyball Ball Floating on the Sand Pitch -->
            <ellipse cx="156" cy="69" rx="8.5" ry="2.8" fill="#d97706" opacity="0.35" class="animate-ball-shadow"/>
            <g class="animate-volleyball cursor-pointer" transform="translate(156, 57)">
              <circle cx="0" cy="0" r="9.5" fill="#ffffff" stroke="#0f172a" stroke-width="2.2"/>
              <path d="M0,-9.5 A9.5,9.5 0 0,1 9.5,0 L0,0 Z" fill="#0284c7" stroke="#0f172a" stroke-width="1.6"/>
              <path d="M-9.5,0 A9.5,9.5 0 0,1 0,9.5 L0,0 Z" fill="#facc15" stroke="#0f172a" stroke-width="1.6"/>
              <path d="M-7.5,-4 Q0,0 7.5,-4" fill="none" stroke="#0f172a" stroke-width="1.3"/>
              <path d="M-4,7.5 Q0,0 4,-7.5" fill="none" stroke="#0f172a" stroke-width="1.3"/>
            </g>
          </svg>
        </div>

        <!-- Pohon Kelapa Tropis Neubrutalist (Curved Segmented Trunk, Coconuts & Lush Fronds) -->
        <div id="heroPalmTree" class="absolute bottom-1 left-3 sm:left-6 md:left-12 pointer-events-auto animate-palm select-none">
          <svg width="120" height="135" viewBox="0 0 125 140" class="drop-shadow-[3px_4px_0px_rgba(15,23,42,0.18)]">
            <!-- Sand Mound Base -->
            <ellipse cx="28" cy="132" rx="20" ry="5.5" fill="#fde68a" stroke="#0f172a" stroke-width="2.2"/>

            <!-- Curved Palm Trunk with Thick Outline and Bark Ridges -->
            <path d="M20,132 C26,98 42,70 66,48 L76,53 C52,76 36,102 34,132 Z" fill="#b45309" stroke="#0f172a" stroke-width="2.5" stroke-linejoin="round"/>
            <!-- Trunk Ring Segments -->
            <path d="M22,122 Q27,119 33,124" stroke="#0f172a" stroke-width="2.2" fill="none"/>
            <path d="M25,108 Q32,105 38,110" stroke="#0f172a" stroke-width="2.2" fill="none"/>
            <path d="M30,94 Q38,91 45,96" stroke="#0f172a" stroke-width="2.2" fill="none"/>
            <path d="M37,80 Q45,77 52,82" stroke="#0f172a" stroke-width="2.2" fill="none"/>
            <path d="M46,67 Q54,64 61,69" stroke="#0f172a" stroke-width="2.2" fill="none"/>

            <!-- Coconuts Cluster -->
            <circle cx="64" cy="53" r="6" fill="#78350f" stroke="#0f172a" stroke-width="2.2"/>
            <circle cx="73" cy="55" r="5.5" fill="#92400e" stroke="#0f172a" stroke-width="2.2"/>
            <circle cx="68" cy="46" r="5" fill="#78350f" stroke="#0f172a" stroke-width="2.2"/>

            <!-- Palm Fronds (Lush, Sweeping Tropical Leaves) -->
            <!-- Leaf 1: Far Left Drop -->
            <path d="M68,48 C48,36 22,46 6,70 C18,63 38,57 68,48 Z" fill="#15803d" stroke="#0f172a" stroke-width="2.2" stroke-linejoin="round"/>
            <path d="M68,48 C42,46 22,56 6,70" fill="none" stroke="#0f172a" stroke-width="1.8"/>

            <!-- Leaf 2: High Left Arch -->
            <path d="M68,48 C52,20 28,14 12,24 C28,24 48,32 68,48 Z" fill="#22c55e" stroke="#0f172a" stroke-width="2.2" stroke-linejoin="round"/>
            <path d="M68,48 C44,24 28,20 12,24" fill="none" stroke="#0f172a" stroke-width="1.8"/>

            <!-- Leaf 3: Top Arch -->
            <path d="M68,48 C62,18 48,6 38,4 C52,10 62,26 68,48 Z" fill="#16a34a" stroke="#0f172a" stroke-width="2.2" stroke-linejoin="round"/>
            <path d="M68,48 C56,20 48,10 38,4" fill="none" stroke="#0f172a" stroke-width="1.8"/>

            <!-- Leaf 4: High Right Arch -->
            <path d="M68,48 C74,16 90,8 106,8 C96,18 86,32 68,48 Z" fill="#22c55e" stroke="#0f172a" stroke-width="2.2" stroke-linejoin="round"/>
            <path d="M68,48 C80,16 94,12 106,8" fill="none" stroke="#0f172a" stroke-width="1.8"/>

            <!-- Leaf 5: Wide Right Arch -->
            <path d="M68,48 C88,30 110,34 124,48 C108,46 88,48 68,48 Z" fill="#16a34a" stroke="#0f172a" stroke-width="2.2" stroke-linejoin="round"/>
            <path d="M68,48 C92,36 112,40 124,48" fill="none" stroke="#0f172a" stroke-width="1.8"/>

            <!-- Leaf 6: Low Right Drop -->
            <path d="M68,48 C84,54 104,64 116,80 C100,70 84,62 68,48 Z" fill="#15803d" stroke="#0f172a" stroke-width="2.2" stroke-linejoin="round"/>
            <path d="M68,48 C88,60 106,70 116,80" fill="none" stroke="#0f172a" stroke-width="1.8"/>
          </svg>
        </div>

        <button id="crab" type="button" class="absolute bottom-4 left-0 w-16 h-13 p-0 border-0 bg-transparent cursor-pointer outline-none pointer-events-auto z-30">
          <img src="/images/sprites/crab.svg" alt="Kepiting pantai" class="w-full h-full pointer-events-none drop-shadow-[2px_3px_0px_rgba(15,23,42,0.25)]" draggable="false" onerror="this.outerHTML='<span class=\'text-4xl\'>🦀</span>'" />
        </button>

        <!-- Area Santai Pantai (Kursi Pantai Santai + Papan Seluncur + Bola Pantai + Bintang Laut) -->
        <div id="heroLoungeArea" class="absolute bottom-2 right-2 sm:right-6 md:right-12 flex items-end gap-2 sm:gap-3 md:gap-4 pointer-events-auto select-none">
          <!-- Kursi Pantai Santai (Reclining Wooden Beach Lounge Chair with Table & Coconut Drink) -->
          <div class="relative drop-shadow-[3px_3px_0px_rgba(15,23,42,0.18)]">
            <svg width="105" height="72" viewBox="0 0 105 72">
              <!-- Sand Shadow -->
              <ellipse cx="52" cy="67" rx="46" ry="4.5" fill="#d97706" opacity="0.25"/>

              <!-- Small Wooden Side Table with Drink -->
              <rect x="6" y="52" width="22" height="4" rx="1.5" fill="#b45309" stroke="#0f172a" stroke-width="1.8"/>
              <line x1="10" y1="56" x2="8" y2="67" stroke="#0f172a" stroke-width="2"/>
              <line x1="24" y1="56" x2="26" y2="67" stroke="#0f172a" stroke-width="2"/>
              <!-- Coconut Drink with Straw -->
              <ellipse cx="17" cy="48" rx="6" ry="5.5" fill="#15803d" stroke="#0f172a" stroke-width="1.8"/>
              <ellipse cx="17" cy="44.5" rx="4.5" ry="2" fill="#ffffff" stroke="#0f172a" stroke-width="1.2"/>
              <!-- Drinking Straw -->
              <path d="M17,44 L20,34 L25,32" fill="none" stroke="#ef4444" stroke-width="2" stroke-linecap="round"/>

              <!-- Beach Lounge Chair Frame (Wooden Scissor Frame) -->
              <line x1="72" y1="28" x2="98" y2="65" stroke="#b45309" stroke-width="4.5" stroke-linecap="round"/>
              <line x1="72" y1="28" x2="98" y2="65" stroke="#0f172a" stroke-width="1.8" stroke-linecap="round"/>
              
              <line x1="38" y1="65" x2="88" y2="20" stroke="#d97706" stroke-width="5" stroke-linecap="round"/>
              <line x1="38" y1="65" x2="88" y2="20" stroke="#0f172a" stroke-width="2" stroke-linecap="round"/>

              <line x1="38" y1="38" x2="52" y2="65" stroke="#b45309" stroke-width="4.5" stroke-linecap="round"/>
              <line x1="38" y1="38" x2="52" y2="65" stroke="#0f172a" stroke-width="1.8" stroke-linecap="round"/>

              <!-- Slung Fabric Canvas (Striped Red & White Beach Canvas) -->
              <path d="M85,15 C72,34 54,46 32,46 L30,52 C56,52 76,38 91,18 Z" fill="#ef4444" stroke="#0f172a" stroke-width="2.2" stroke-linejoin="round"/>
              <!-- Stripes on Canvas -->
              <path d="M80,21 C76,27 72,32 68,36 L64,40 C67,35 71,30 75,25 Z" fill="#ffffff"/>
              <path d="M60,42 C54,45 48,48 40,48 L38,52 C46,52 52,49 58,45 Z" fill="#ffffff"/>

              <!-- Comfy Headrest Pillow -->
              <g transform="translate(78, 10) rotate(-32)">
                <rect x="0" y="0" width="18" height="9" rx="3.5" fill="#fde047" stroke="#0f172a" stroke-width="2"/>
                <line x1="9" y1="2" x2="9" y2="7" stroke="#ca8a04" stroke-width="1.5" stroke-linecap="round"/>
              </g>
            </svg>
          </div>

          <!-- Papan Seluncur (Surfboard standing planted in sand) -->
          <div class="relative mb-1">
            <svg width="34" height="84" viewBox="0 0 40 90" class="rotate-12 drop-shadow-[2px_3px_0px_rgba(15,23,42,0.2)]">
              <path d="M20,4 C34,24 36,62 28,86 L12,86 C4,62 6,24 20,4 Z" fill="#0284c7" stroke="#0f172a" stroke-width="3"/>
              <path d="M20,6 L20,86" stroke="#ffffff" stroke-width="4"/>
              <path d="M16,14 L16,84" stroke="#fde047" stroke-width="1.8"/>
              <circle cx="20" cy="24" r="3" fill="#f97316" stroke="#0f172a" stroke-width="1.2"/>
            </svg>
          </div>

          <!-- Bola Pantai (Beach Ball) -->
          <div class="relative mb-0.5">
            <svg width="34" height="34" viewBox="0 0 40 40" class="drop-shadow-[2px_2px_0px_rgba(15,23,42,0.2)]">
              <circle cx="20" cy="20" r="16" fill="#fef08a" stroke="#0f172a" stroke-width="2.5"/>
              <path d="M20,4 A16,16 0 0,1 36,20 L20,20 Z" fill="#ef4444" stroke="#0f172a" stroke-width="2"/>
              <path d="M4,20 A16,16 0 0,1 20,36 L20,20 Z" fill="#38bdf8" stroke="#0f172a" stroke-width="2"/>
              <circle cx="20" cy="20" r="4.5" fill="#ffffff" stroke="#0f172a" stroke-width="1.8"/>
            </svg>
          </div>

          <!-- Bintang Laut Oranye (Starfish) -->
          <div class="relative mb-1 hidden sm:block">
            <svg width="24" height="24" viewBox="0 0 32 32" class="rotate-12">
              <polygon points="16,1 20,11 31,11 22,18 26,29 16,22 6,29 10,18 1,11 12,11" fill="#f97316" stroke="#0f172a" stroke-width="2" stroke-linejoin="round"/>
            </svg>
          </div>
        </div>
      </div>
    </section>

    <!-- ================= 4. SECTION PROFIL & KEAHLIAN ================= -->
    <section id="profil" class="relative pt-10 pb-20 overflow-hidden" style="background: linear-gradient(180deg, #fef9c3 0%, #fefce8 25%, #fefce8 75%, #fef9c3 100%); margin-top: -1px;">
      <!-- Layered Beach Sand Dune Texture & Dashed Contours (1:1 Reference Match) -->
      <svg class="absolute inset-0 w-full h-full pointer-events-none z-0" viewBox="0 0 1440 900" preserveAspectRatio="none" aria-hidden="true">
        <path d="M0,180 C340,120 680,250 1060,175 C1240,140 1360,165 1440,190" fill="none" stroke="#fde68a" stroke-width="45" opacity="0.18"/>
        <path d="M0,380 C420,450 760,310 1140,390 C1290,420 1380,395 1440,380" fill="none" stroke="#fde68a" stroke-width="45" opacity="0.15"/>
        <path d="M0,620 C380,550 820,690 1200,605 C1320,578 1390,600 1440,625" fill="none" stroke="#fde68a" stroke-width="45" opacity="0.18"/>
        <!-- Subtle Dashed Sand Contour Lines -->
        <path d="M-20,210 C350,150 690,275 1080,200 C1250,168 1370,190 1460,215" fill="none" stroke="#d97706" stroke-width="2" stroke-opacity="0.14" stroke-dasharray="7 10"/>
        <path d="M-20,430 C410,495 750,355 1130,435 C1280,465 1380,440 1460,425" fill="none" stroke="#d97706" stroke-width="2" stroke-opacity="0.14" stroke-dasharray="7 10"/>
        <path d="M-20,665 C370,595 810,730 1190,648 C1320,620 1395,642 1460,668" fill="none" stroke="#d97706" stroke-width="2" stroke-opacity="0.12" stroke-dasharray="6 10"/>
        <!-- Scattered Sand Pebbles & Shells -->
        <circle cx="110" cy="290" r="3" fill="#d97706" opacity="0.18"/>
        <circle cx="132" cy="304" r="2" fill="#b45309" opacity="0.15"/>
        <circle cx="480" cy="140" r="2.5" fill="#d97706" opacity="0.16"/>
        <circle cx="920" cy="240" r="3" fill="#b45309" opacity="0.15"/>
        <circle cx="1290" cy="510" r="3.5" fill="#d97706" opacity="0.18"/>
        <circle cx="240" cy="740" r="3" fill="#b45309" opacity="0.16"/>
        <circle cx="760" cy="790" r="2.5" fill="#d97706" opacity="0.16"/>
        <!-- Top-Right Orange Starfish -->
        <g transform="translate(1335, 72) rotate(14)">
          <polygon points="16,0 20,11 32,11 22,18 26,30 16,23 6,30 10,18 0,11 12,11" fill="#f97316" stroke="#0f172a" stroke-width="2" stroke-linejoin="round"/>
        </g>
      </svg>
      <div class="max-w-5xl mx-auto px-4 md:px-8 relative z-10">
        <!-- Header Row -->
        <div class="flex flex-col md:flex-row md:items-end justify-between gap-4 mb-10">
          <div>
            <div class="font-mono-code text-xs font-extrabold tracking-[0.2em] text-slate-500 uppercase mb-1">PROFIL &amp; KEAHLIAN</div>
            <h2 class="text-3xl md:text-4xl font-extrabold text-slate-900 tracking-tight">{{ $profile->headline ?? $profile->role }}</h2>
          </div>
          <div class="flex flex-wrap items-center gap-3">
            <button id="floodBeachBtn" type="button" class="nb-btn px-4 py-2.5 text-xs" style="background: #0284c7; color: #ffffff;">
              <span>🌊</span> <span>Flood Beach</span>
            </button>
            <div class="px-4 py-2 rounded-xl border-2 border-dashed border-slate-400 bg-white/85 text-xs text-slate-700 max-w-xs leading-relaxed font-medium">
              {{ $profile->tagline }}
            </div>
          </div>
        </div>

        <!-- 7 Physics-Collapsible Cards Grid -->
        <div id="profilePhysicsArena" class="grid grid-cols-1 lg:grid-cols-12 gap-7 items-start">
          <!-- Card 1: Polaroid Photo Card -->
          <div class="lg:col-span-4 nb-card p-4 physics-collapsible polaroid-card">
            <div class="w-full aspect-[4/4.3] rounded-xl border-2 border-slate-900 overflow-hidden bg-slate-200 mb-4 relative flex items-end justify-center">
              <img src="{{ asset($profile->photo_path ?? 'images/profile.jpeg') }}?v=profile" alt="{{ $profile->name }}" class="w-full h-full object-cover block pointer-events-none" onerror="this.onerror=null;this.src='/images/profile.jpeg';" />
              <svg viewBox="0 0 240 260" class="w-full h-full hidden">
                <rect width="240" height="260" fill="#dc2626"/>
                <path d="M32,260 C36,192 80,178 120,178 C160,178 204,192 208,260 Z" fill="#0f172a"/>
                <polygon points="96,178 120,218 144,178" fill="#ffffff"/>
                <rect x="82" y="64" width="76" height="92" rx="36" fill="#f1c27d" stroke="#0f172a" stroke-width="3"/>
              </svg>
            </div>
            <h3 class="text-lg font-extrabold text-slate-900">{{ $profile->name }}</h3>
            <p class="text-xs text-slate-600 font-medium mt-0.5 mb-3">{{ $profile->education }}</p>
            <div class="pt-3 border-t border-slate-200 flex items-center justify-between text-xs font-bold">
              <span class="text-slate-600">📍 {{ $profile->location }}</span>
              <span class="px-2.5 py-1 rounded-full bg-sky-100 text-sky-700 border border-slate-900 font-mono-code text-[10px] font-extrabold">{{ $profile->short_title ?? $profile->role }}</span>
            </div>
          </div>

          <!-- Right Column: Unified Tab Bar + Main Expertise Card + 3 Principle Cards -->
          <div class="lg:col-span-8 flex flex-col gap-4">
            <div id="skillTabBar" class="bg-white border-2 border-slate-900 rounded-2xl p-1.5 grid grid-cols-{{ max(1, $profile->expertises->count()) }} gap-2 shadow-[4px_4px_0px_#0f172a] physics-collapsible">
              @foreach($profile->expertises as $i => $e)
                <button type="button" class="skill-tab-btn rounded-xl py-2.5 px-3 flex flex-col items-center justify-center gap-0.5 font-extrabold transition cursor-pointer border-0" data-tab="{{ $e->slug }}" style="{{ $i === 0 ? 'background:#0284c7; color:#ffffff;' : 'background:transparent; color:#0f172a;' }}">
                  <span class="font-mono-code text-[10px] {{ $i === 0 ? 'opacity-80' : 'text-slate-400' }}">{{ sprintf("%02d", $i + 1) }}</span>
                  <span class="text-xs font-extrabold tracking-wider">{{ strtoupper($e->label) }}</span>
                </button>
              @endforeach
            </div>

            @php $firstExp = $profile->expertises->first(); @endphp
            <div id="skillMainCard" class="nb-card p-6 md:p-7 physics-collapsible">
              <div id="skillKicker" class="font-mono-code text-xs font-extrabold text-sky-600 mb-1">
                &lt;/&gt; 01 / {{ $firstExp?->title ?? 'Keahlian' }}
              </div>
              <h3 id="skillTitle" class="text-2xl font-extrabold text-slate-900 mb-2.5">{{ $firstExp?->title ?? 'Web Development' }}</h3>
              <p id="skillDesc" class="text-sm text-slate-600 leading-relaxed mb-5">
                {{ $firstExp?->description ?? '' }}
              </p>
              <div class="font-mono-code text-[10px] font-extrabold text-slate-400 uppercase tracking-widest mb-2.5">TECH STACK:</div>
              <div id="skillPills" class="flex flex-wrap gap-2">
                @if($firstExp)
                  @foreach($firstExp->skills as $sk)
                    <span class="px-3 py-1.5 rounded-full border-2 border-slate-900 bg-slate-50 text-slate-900 text-xs font-extrabold shadow-[2px_2px_0px_#0f172a]">{{ $sk->name }}</span>
                  @endforeach
                @endif
              </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-3.5">
              @php
                $principleBorders = ['border-t-sky-500', 'border-t-orange-500', 'border-t-sky-900'];
              @endphp
              @foreach($profile->principles as $i => $pr)
                <div class="nb-card-sm p-4 border-t-[5px] {{ $principleBorders[$i % 3] }} physics-collapsible">
                  <h4 class="font-extrabold text-xs text-slate-900 mb-1">{{ $pr->title }}</h4>
                  <p class="text-[11px] text-slate-600 leading-relaxed">{{ $pr->description }}</p>
                </div>
              @endforeach
            </div>
          </div>
        </div>
      </div>

      <!-- Natural Organic Water Puddles Layer Behind Cards (Revealed on Flood Beach) -->
      <svg class="sand-puddles absolute inset-0 w-full h-full pointer-events-none z-[1]" viewBox="0 0 1440 900" preserveAspectRatio="none" aria-hidden="true">
        <defs>
          <radialGradient id="puddleGrad" cx="45%" cy="40%" r="60%">
            <stop offset="0%" stop-color="#7dd3fc" stop-opacity="0.58"/>
            <stop offset="65%" stop-color="#38bdf8" stop-opacity="0.48"/>
            <stop offset="100%" stop-color="#0284c7" stop-opacity="0.34"/>
          </radialGradient>
        </defs>
        <!-- Puddle 1 (Bottom-Left) -->
        <g>
          <path d="M88,695 C120,665 198,660 258,676 C312,690 355,674 378,698 C398,720 356,750 288,754 C216,758 140,750 96,732 C66,720 68,712 88,695 Z" fill="#d97706" opacity="0.14"/>
          <path d="M98,697 C128,671 198,667 254,681 C304,693 344,679 365,700 C382,718 345,743 284,746 C218,750 148,743 106,727 C79,716 81,711 98,697 Z" fill="url(#puddleGrad)"/>
          <path d="M148,696 C188,684 246,688 282,698" fill="none" stroke="#e0f2fe" stroke-width="3" stroke-linecap="round" opacity="0.72"/>
          <circle cx="322" cy="712" r="4" fill="#e0f2fe" opacity="0.75"/>
          <circle cx="395" cy="718" r="7" fill="#38bdf8" opacity="0.38"/>
        </g>
        <!-- Puddle 2 (Center-Mid) -->
        <g>
          <path d="M475,535 C525,500 622,494 705,512 C768,526 818,505 845,532 C868,556 822,592 738,596 C648,600 546,592 488,572 C450,558 452,550 475,535 Z" fill="#d97706" opacity="0.13"/>
          <path d="M488,537 C534,507 624,502 700,518 C758,530 804,512 829,535 C849,555 808,584 732,588 C650,592 556,584 500,567 C466,555 468,549 488,537 Z" fill="url(#puddleGrad)"/>
          <path d="M555,534 C608,520 682,522 732,535" fill="none" stroke="#ffffff" stroke-width="3" stroke-linecap="round" opacity="0.65"/>
          <path d="M590,560 C635,568 688,566 720,558" fill="none" stroke="#bae6fd" stroke-width="2" stroke-linecap="round" opacity="0.55"/>
        </g>
        <!-- Puddle 3 (Bottom-Right) -->
        <g>
          <path d="M915,722 C960,688 1048,684 1126,700 C1188,712 1236,696 1258,722 C1278,746 1230,776 1148,780 C1060,784 975,774 924,756 C892,744 894,736 915,722 Z" fill="#d97706" opacity="0.14"/>
          <path d="M926,724 C968,695 1048,691 1120,705 C1176,716 1220,702 1242,724 C1259,744 1216,769 1142,772 C1062,776 984,767 936,751 C907,741 908,735 926,724 Z" fill="url(#puddleGrad)"/>
          <path d="M988,722 C1038,710 1106,712 1152,724" fill="none" stroke="#ffffff" stroke-width="3" stroke-linecap="round" opacity="0.68"/>
          <circle cx="882" cy="744" r="9" fill="#38bdf8" opacity="0.35"/>
        </g>
        <!-- Puddle 4 (Upper-Right) -->
        <g>
          <path d="M1145,380 C1180,356 1244,352 1296,366 C1336,376 1372,368 1384,386 C1396,404 1362,422 1304,424 C1242,426 1178,418 1148,402 C1128,392 1130,390 1145,380 Z" fill="#d97706" opacity="0.12"/>
          <path d="M1154,382 C1185,361 1244,358 1291,370 C1327,379 1360,372 1371,387 C1381,402 1351,417 1299,418 C1243,420 1185,413 1157,400 C1140,391 1141,390 1154,382 Z" fill="url(#puddleGrad)"/>
          <path d="M1200,382 C1238,374 1284,376 1314,384" fill="none" stroke="#e0f2fe" stroke-width="2.5" stroke-linecap="round" opacity="0.7"/>
        </g>
      </svg>

      <!-- Medium-Sized Detailed Sandcastle on the Beach (Crumbles & Buried in Sand on Flood Beach) -->
      <div id="sandCastleProp" class="absolute bottom-4 right-6 md:right-12 z-20 w-[124px] h-[104px] pointer-events-none select-none" aria-hidden="true">
        <!-- Intact Detailed Sandcastle -->
        <svg class="sandcastle-intact absolute inset-0 w-full h-full drop-shadow-[3px_4px_0px_rgba(15,23,42,0.18)]" viewBox="0 0 136 112" fill="none">
          <defs>
            <linearGradient id="sandWall" x1="0" y1="0" x2="0" y2="1">
              <stop offset="0%" stop-color="#fde047"/>
              <stop offset="100%" stop-color="#f59e0b"/>
            </linearGradient>
            <linearGradient id="sandTower" x1="0" y1="0" x2="1" y2="1">
              <stop offset="0%" stop-color="#fef08a"/>
              <stop offset="100%" stop-color="#f59e0b"/>
            </linearGradient>
          </defs>
          <!-- Sculpted Sand Base Mound -->
          <path d="M10,100 C18,88 42,86 68,86 C94,86 118,88 126,100 C128,104 114,107 68,107 C22,107 8,104 10,100 Z" fill="#fde047" stroke="#0f172a" stroke-width="2.2"/>
          <!-- Flag Pole & Waving Pennant -->
          <line x1="68" y1="9" x2="68" y2="30" stroke="#0f172a" stroke-width="2.4" stroke-linecap="round"/>
          <path d="M69,9 C78,11 84,13 92,15 C84,18 78,20 69,22 Z" fill="#0284c7" stroke="#0f172a" stroke-width="2" stroke-linejoin="round"/>
          <!-- Left Tower + Conical Roof -->
          <rect x="20" y="48" width="24" height="46" rx="2" fill="url(#sandTower)" stroke="#0f172a" stroke-width="2.4"/>
          <path d="M18,48 L18,41 L24,41 L24,45 L29,45 L29,41 L35,41 L35,45 L40,45 L40,41 L46,41 L46,48 Z" fill="#fbbf24" stroke="#0f172a" stroke-width="2.2" stroke-linejoin="round"/>
          <path d="M22,41 L32,26 L42,41 Z" fill="#f97316" stroke="#0f172a" stroke-width="2.2" stroke-linejoin="round"/>
          <!-- Right Tower + Conical Roof -->
          <rect x="92" y="48" width="24" height="46" rx="2" fill="url(#sandTower)" stroke="#0f172a" stroke-width="2.4"/>
          <path d="M90,48 L90,41 L96,41 L96,45 L101,45 L101,41 L107,41 L107,45 L112,45 L112,41 L118,41 L118,48 Z" fill="#fbbf24" stroke="#0f172a" stroke-width="2.2" stroke-linejoin="round"/>
          <path d="M94,41 L104,26 L114,41 Z" fill="#f97316" stroke="#0f172a" stroke-width="2.2" stroke-linejoin="round"/>
          <!-- Center Keep -->
          <rect x="44" y="36" width="48" height="58" rx="2" fill="url(#sandWall)" stroke="#0f172a" stroke-width="2.4"/>
          <path d="M42,36 L42,28 L50,28 L50,32 L57,32 L57,28 L65,28 L65,32 L71,32 L71,28 L79,28 L79,32 L86,32 L86,28 L94,28 L94,36 Z" fill="#fbbf24" stroke="#0f172a" stroke-width="2.2" stroke-linejoin="round"/>
          <!-- Subtle Brick Lines -->
          <line x1="48" y1="48" x2="60" y2="48" stroke="#d97706" stroke-width="1.6" stroke-linecap="round" opacity="0.6"/>
          <line x1="76" y1="54" x2="88" y2="54" stroke="#d97706" stroke-width="1.6" stroke-linecap="round" opacity="0.6"/>
          <line x1="25" y1="74" x2="36" y2="74" stroke="#d97706" stroke-width="1.6" stroke-linecap="round" opacity="0.6"/>
          <!-- Arched Gate & Sand Steps -->
          <path d="M58,94 L58,71 C58,63 78,63 78,71 L78,94 Z" fill="#78350f" stroke="#0f172a" stroke-width="2.4"/>
          <line x1="68" y1="65" x2="68" y2="94" stroke="#451a03" stroke-width="1.6"/>
          <rect x="55" y="94" width="26" height="4" rx="1.5" fill="#fde047" stroke="#0f172a" stroke-width="1.8"/>
          <!-- Arched Tower Windows -->
          <rect x="29" y="56" width="6" height="10" rx="3" fill="#78350f" stroke="#0f172a" stroke-width="1.8"/>
          <rect x="101" y="56" width="6" height="10" rx="3" fill="#78350f" stroke="#0f172a" stroke-width="1.8"/>
          <!-- Tiny Seashell Accent -->
          <circle cx="15" cy="99" r="3.5" fill="#fda4af" stroke="#0f172a" stroke-width="1.6"/>
        </svg>

        <!-- Detailed Ruined & Half-Buried-in-Sand Castle (Shown on Flood Beach) -->
        <svg class="sandcastle-ruined absolute inset-0 w-full h-full" viewBox="0 0 136 112" fill="none">
          <!-- Organic Water Surge Puddle Around Ruin -->
          <path d="M6,98 C16,84 48,84 72,88 C98,92 122,86 131,97 C137,104 114,110 70,110 C28,110 1,105 6,98 Z" fill="#38bdf8" opacity="0.52"/>
          <path d="M26,98 C50,93 84,94 108,99" fill="none" stroke="#e0f2fe" stroke-width="2.2" stroke-linecap="round" opacity="0.8"/>
          <!-- Cracked & Tilted Left Tower Remnant -->
          <g transform="translate(22, 68) rotate(-18)">
            <rect x="0" y="0" width="22" height="26" rx="2" fill="#fbbf24" stroke="#0f172a" stroke-width="2.2"/>
            <rect x="8" y="8" width="5" height="8" rx="2.5" fill="#78350f" stroke="#0f172a" stroke-width="1.6"/>
          </g>
          <!-- Crumbled Center Keep Half-Submerged -->
          <path d="M44,96 L46,66 L56,72 L65,61 L76,70 L88,65 L92,96 Z" fill="#fcd34d" stroke="#0f172a" stroke-width="2.2" stroke-linejoin="round"/>
          <!-- Half-Buried Arched Gate -->
          <path d="M60,96 L60,78 C60,72 76,72 76,78 L76,96 Z" fill="#78350f" stroke="#0f172a" stroke-width="2.2"/>
          <!-- Fallen Roof Cone on the Right -->
          <path d="M96,88 L114,76 L112,94 Z" fill="#f97316" stroke="#0f172a" stroke-width="2.1" stroke-linejoin="round"/>
          <!-- Wet Sand Drift Partially Burying the Base -->
          <path d="M12,99 C28,83 50,86 66,92 C82,85 106,84 124,99 C104,104 34,105 12,99 Z" fill="#f59e0b" stroke="#0f172a" stroke-width="2"/>
          <!-- Scattered Bricks & Fallen Flag Stuck in Wet Sand -->
          <rect x="34" y="86" width="12" height="7" rx="1.5" transform="rotate(-24 34 86)" fill="#fde047" stroke="#0f172a" stroke-width="1.8"/>
          <rect x="84" y="84" width="12" height="7" rx="1.5" transform="rotate(20 84 84)" fill="#fbbf24" stroke="#0f172a" stroke-width="1.8"/>
          <g transform="translate(74, 72) rotate(56)">
            <line x1="0" y1="0" x2="0" y2="20" stroke="#0f172a" stroke-width="2.2" stroke-linecap="round"/>
            <path d="M1,0 C7,2 12,3 17,5 C12,7 7,8 1,10 Z" fill="#0284c7" stroke="#0f172a" stroke-width="1.8" stroke-linejoin="round"/>
          </g>
          <!-- Water Splash Droplets -->
          <circle cx="18" cy="84" r="2.5" fill="#7dd3fc"/>
          <circle cx="120" cy="86" r="3" fill="#bae6fd"/>
        </svg>
      </div>
    </section>

    <!-- ================= 5. SECTION STUDI KASUS (STICKY FLAGSHIP + FLIP INDEX + MODAL) ================= -->
    <section id="studi-kasus" class="relative water" style="background: #036194; margin-top: -1px;">

      <!-- Wave Ocean Ingress Transition entering Studi Kasus (100% Full Width Edge-to-Edge, Smooth Organic Curve) -->
      <div class="w-full overflow-hidden leading-none relative z-10">
        <svg viewBox="0 0 1440 90" class="w-full h-16 md:h-20 block" preserveAspectRatio="none">
          <path fill="#fef9c3" d="M0,0 L1440,0 L1440,45 C1080,95 360,5 0,55 Z"></path>
          <path fill="none" stroke="#ffffff" stroke-width="5" d="M0,55 C360,5 1080,95 1440,45"></path>
        </svg>
      </div>

      <!-- Sweeping Depth Contour Lines (Matching Kontak & Reference) -->
      <div class="absolute inset-0 pointer-events-none overflow-hidden z-0 opacity-25">
        <svg class="w-full h-full" preserveAspectRatio="none" viewBox="0 0 1440 2400" fill="none">
          <path d="M-50,220 C320,170 650,260 1020,200 C1250,170 1380,220 1500,190" stroke="#ffffff" stroke-width="2" stroke-dasharray="8 8" />
          <path d="M-50,560 C280,600 620,520 980,570 C1220,610 1390,550 1500,570" stroke="#ffffff" stroke-width="2" stroke-dasharray="8 8" />
          <path d="M-50,920 C350,880 720,950 1080,900 C1290,870 1410,920 1500,900" stroke="#ffffff" stroke-width="2" stroke-dasharray="8 8" />
          <path d="M-50,1320 C300,1360 660,1280 1020,1330 C1240,1370 1380,1320 1500,1340" stroke="#ffffff" stroke-width="2" stroke-dasharray="8 8" />
          <path d="M-50,1740 C340,1690 700,1780 1060,1720 C1280,1690 1400,1730 1500,1710" stroke="#ffffff" stroke-width="2" stroke-dasharray="8 8" />
          <path d="M-50,2120 C290,2170 650,2090 1020,2140 C1240,2180 1380,2130 1500,2150" stroke="#ffffff" stroke-width="2" stroke-dasharray="8 8" />
        </svg>
      </div>

      <!-- Ambient Underwater Bubbles & Forward-Swimming Fish Sprites -->
      <div class="fx-ambient" id="studyAmbientSea"></div>

      <!-- PART A: STICKY SCROLL-HIJACK FLAGSHIP SHOWCASE -->
      <div id="flagshipScrollTrack" class="relative h-[250vh] z-10">
        <div class="sticky top-16 md:top-20 py-3 md:py-6 flex flex-col justify-start relative">
          <!-- Ambient Underwater Bubbles & Swimming Fish for Flagship Stage -->
          <div class="fx-ambient pointer-events-none" id="flagshipAmbientSea"></div>

          <!-- Content Wrapper (max-w-5xl, centered, z-10) -->
          <div class="w-full py-6 px-4 md:px-8 max-w-5xl mx-auto relative z-10">
            <div class="flex flex-wrap items-center gap-2.5 sm:gap-3 mb-6">
              <span id="flagshipBadgeCode" class="px-3.5 py-1.5 rounded-xl bg-amber-300 border-2 border-slate-900 font-mono-code text-xs font-extrabold text-slate-900 shadow-[2px_2px_0px_#0f172a]">
                {{ $firstProj['code'] ?? '01 // FULL-STACK WEB' }}
              </span>
              <span id="flagshipBadgeRole" class="px-3.5 py-1.5 rounded-full bg-white border-2 border-slate-900 text-xs font-extrabold text-slate-900 shadow-[2px_2px_0px_#0f172a]">
                {{ $firstProj['roleBadge'] ?? 'Full-Stack Engineer' }}
              </span>
              <div id="flagshipCounterPill" class="flex items-center gap-2.5 sm:gap-3 px-3.5 sm:px-4 py-1.5 rounded-full bg-white border-2 border-slate-900 shadow-[2px_2px_0px_#0f172a] cursor-pointer" title="Klik atau scroll untuk ganti proyek">
                <span id="flagshipCounterText" class="font-mono-code text-xs font-extrabold text-slate-900">FLAGSHIP 1 / {{ $projectsJs->count() }}</span>
                <div class="flex items-center gap-1.5">
                  @foreach($projectsJs as $i => $proj)
                    <button type="button" class="flagship-dot {{ $i === 0 ? 'w-6 h-2.5 rounded-full bg-amber-400' : 'w-2.5 h-2.5 rounded-full bg-slate-200' }} border border-slate-900 cursor-pointer transition-all" data-idx="{{ $i }}"></button>
                  @endforeach
                </div>
              </div>
            </div>

            <!-- Active Flagship 2-Column Stage -->
            <div id="flagshipCardStage" class="grid grid-cols-1 lg:grid-cols-12 gap-7 items-start">
            <div class="lg:col-span-6 nb-card p-6 md:p-8">
              <h3 id="fpTitle" class="text-2xl md:text-3xl font-extrabold text-slate-900 mb-1 leading-tight">
                @if(str_contains($firstProj['title'] ?? '', ' ('))
                  {!! str_replace(' (', '<br><span class="text-xl md:text-2xl font-bold text-slate-700">(', e($firstProj['title'])) . '</span>' !!}
                @else
                  {{ $firstProj['title'] ?? '' }}
                @endif
              </h3>
              <div id="fpSubtitle" class="font-mono-code text-xs md:text-sm font-extrabold text-sky-600 mb-3">
                {{ $firstProj['subtitle'] ?? '' }}
              </div>
              <p id="fpDesc" class="text-xs md:text-sm text-slate-600 leading-relaxed mb-5">
                {{ $firstProj['desc'] ?? '' }}
              </p>

              <div class="grid grid-cols-3 gap-2.5 mb-5">
                <div class="p-2.5 rounded-xl bg-sky-100 border-2 border-slate-900 shadow-[2px_2px_0px_#0f172a]">
                  <div id="fpM1Label" class="font-mono-code text-[9px] font-extrabold text-slate-600 uppercase">{{ $firstProj['m1Label'] ?? 'ARCHITECTURE' }}</div>
                  <div id="fpM1Val" class="text-xs font-extrabold text-slate-900 mt-0.5">{{ $firstProj['m1Val'] ?? '' }}</div>
                </div>
                <div class="p-2.5 rounded-xl bg-amber-100 border-2 border-slate-900 shadow-[2px_2px_0px_#0f172a]">
                  <div id="fpM2Label" class="font-mono-code text-[9px] font-extrabold text-slate-600 uppercase">{{ $firstProj['m2Label'] ?? 'ORCHESTRATION' }}</div>
                  <div id="fpM2Val" class="text-xs font-extrabold text-slate-900 mt-0.5">{{ $firstProj['m2Val'] ?? '' }}</div>
                </div>
                <div class="p-2.5 rounded-xl bg-emerald-100 border-2 border-slate-900 shadow-[2px_2px_0px_#0f172a]">
                  <div id="fpM3Label" class="font-mono-code text-[9px] font-extrabold text-slate-600 uppercase">{{ $firstProj['m3Label'] ?? 'SERVICE' }}</div>
                  <div id="fpM3Val" class="text-xs font-extrabold text-slate-900 mt-0.5">{{ $firstProj['m3Val'] ?? '' }}</div>
                </div>
              </div>

              <div id="fpTechPills" class="flex flex-wrap gap-1.5 mb-6"></div>

              <div class="flex flex-wrap items-center gap-3">
                <button type="button" id="fpOpenModalBtn" class="nb-btn px-4 py-2.5 text-xs" style="background:#0284c7; color:#ffffff;">
                  <span>Studi Kasus</span> <span>↗</span>
                </button>
                <button type="button" id="fpLiveDemoBtn" class="nb-btn px-4 py-2.5 text-xs" style="background:#facc15; color:#0f172a;">
                  <span>⚡</span> <span>Live Demo</span>
                </button>
                <a id="fpGithubBtn" href="{{ $firstProj['github'] ?? $profile->github }}" target="_blank" rel="noopener" class="nb-btn px-4 py-2.5 text-xs" style="background:#ffffff; color:#0f172a;">
                  <span>GitHub</span> <span>↗</span>
                </a>
              </div>
            </div>

            <div id="fpBrowserCard" class="lg:col-span-6 nb-card overflow-hidden p-0 rotate-1 hover:rotate-0 transition-transform duration-300 cursor-pointer">
              <div class="bg-slate-100 border-b-[3px] border-slate-900 px-4 py-2.5 flex items-center justify-between gap-2">
                <div class="flex items-center gap-1.5">
                  <span class="w-3 h-3 rounded-full bg-red-400 border border-slate-900"></span>
                  <span class="w-3 h-3 rounded-full bg-amber-400 border border-slate-900"></span>
                  <span class="w-3 h-3 rounded-full bg-emerald-400 border border-slate-900"></span>
                </div>
                <div class="flex-1 max-w-xs px-3 py-1 rounded-md bg-white border border-slate-900 font-mono-code text-[11px] text-slate-700 flex items-center gap-1.5 truncate">
                  <span>🔒</span> <span id="fpUrlText">{{ $firstProj['url'] ?? '' }}</span>
                </div>
                <span id="fpPlatformBadge" class="px-2 py-0.5 rounded bg-amber-300 border border-slate-900 font-mono-code text-[9px] font-extrabold text-slate-900">
                  {{ $firstProj['platformBadge'] ?? 'WEB PLATFORM' }}
                </span>
              </div>
              <div id="fpArtworkBox" class="relative min-h-[290px] w-full overflow-hidden bg-white">{!! $firstProj['artworkHtml'] ?? '' !!}</div>
            </div>
          </div>

          <!-- Mobile Next / Previous Navigation Controls (< 768px) -->
          <div class="flex items-center justify-between gap-3 mt-4 md:hidden">
            <button type="button" id="fpMobilePrevBtn" class="nb-btn px-4 py-2.5 text-xs flex-1 justify-center" style="background:#ffffff; color:#0f172a;">
              <span>←</span> <span>Sebelumnya</span>
            </button>
            <button type="button" id="fpMobileNextBtn" class="nb-btn px-4 py-2.5 text-xs flex-1 justify-center" style="background:#facc15; color:#0f172a;">
              <span>Berikutnya</span> <span>→</span>
            </button>
          </div>
        </div>
      </div>
    </div>

      <!-- PART B: INDEKS PORTOFOLIO LENGKAP -->
      <div class="max-w-5xl mx-auto px-4 md:px-8 pt-6 pb-20 relative z-10">
        <div class="flex flex-col md:flex-row md:items-end justify-between gap-4 mb-8">
          <div>
            <span class="inline-block px-3 py-1 rounded-lg bg-amber-300 border-2 border-slate-900 font-mono-code text-[11px] font-extrabold text-slate-900 shadow-[2px_2px_0px_#0f172a] mb-2">
              04 // INDEKS PORTOFOLIO LENGKAP
            </span>
            <h2 class="text-2xl md:text-3xl font-extrabold text-white drop-shadow">Eksplorasi Proyek &amp; Hasil Rekayasa</h2>
          </div>

          <div class="flex flex-wrap gap-2">
            <button type="button" class="idx-filter-btn nb-btn px-3.5 py-2 text-xs" data-filter="all" style="background:#0284c7; color:#ffffff;">
              Semua Proyek <span class="px-1.5 py-0.2 rounded-full bg-slate-900 text-white text-[10px]">{{ $profile->projects->count() }}</span>
            </button>
            @foreach($projectCategories as $pCat)
              <button type="button" class="idx-filter-btn nb-btn px-3.5 py-2 text-xs" data-filter="{{ $pCat->slug }}" style="background:#ffffff; color:#0f172a;">
                {{ $pCat->name }} <span class="px-1.5 py-0.2 rounded-full bg-slate-200 text-slate-900 text-[10px]">{{ $profile->projects->where('project_category_id', $pCat->id)->count() }}</span>
              </button>
            @endforeach
          </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-12 gap-6 items-start">
          <div id="idxListContainer" class="lg:col-span-5 flex flex-col gap-3.5"></div>

          <div id="idxDetailCard" class="lg:col-span-7 nb-card p-5 transition-all duration-300">
            <div class="rounded-xl border-2 border-slate-900 overflow-hidden mb-5">
              <div class="bg-slate-100 border-b-2 border-slate-900 px-3 py-2 flex items-center justify-between">
                <div class="flex items-center gap-1.5">
                  <span class="w-2.5 h-2.5 rounded-full bg-red-400 border border-slate-900"></span>
                  <span class="w-2.5 h-2.5 rounded-full bg-amber-400 border border-slate-900"></span>
                  <span class="w-2.5 h-2.5 rounded-full bg-emerald-400 border border-slate-900"></span>
                </div>
                <span id="idxUrlText" class="font-mono-code text-[10px] text-slate-600">🔒 https://tokoku.app</span>
                <span id="idxPlatformBadge" class="px-2 py-0.5 rounded bg-amber-300 border border-slate-900 font-mono-code text-[9px] font-extrabold text-slate-900">WEB PLATFORM</span>
              </div>
              <div id="idxArtworkBox" class="min-h-[230px] w-full overflow-hidden bg-white relative"></div>
            </div>

            <div class="flex items-center justify-between gap-2 mb-1">
              <h3 id="idxTitle" class="text-xl font-extrabold text-slate-900">{{ $firstProj['title'] ?? '' }}</h3>
              <span id="idxRoleBadge" class="px-2.5 py-0.5 rounded-full bg-sky-100 border border-slate-900 font-mono-code text-[10px] font-extrabold text-sky-800">{{ $firstProj['roleBadge'] ?? '' }}</span>
            </div>
            <div id="idxSubtitle" class="font-mono-code text-xs font-extrabold text-sky-600 mt-0.5 mb-2">Rural E-Commerce Platform untuk UMKM &amp; Produk Desa</div>
            <p id="idxDesc" class="text-xs text-slate-600 leading-relaxed mb-4"></p>

            <div class="grid grid-cols-3 gap-2.5 mb-4">
              <div class="p-2 rounded-lg bg-sky-100 border-2 border-slate-900 text-center">
                <div class="font-mono-code text-[9px] font-bold text-slate-600">ARCHITECTURE</div>
                <div id="idxM1" class="text-xs font-extrabold text-slate-900">Full-Stack Dev</div>
              </div>
              <div class="p-2 rounded-lg bg-amber-100 border-2 border-slate-900 text-center">
                <div class="font-mono-code text-[9px] font-bold text-slate-600">ORCHESTRATION</div>
                <div id="idxM2" class="text-xs font-extrabold text-slate-900">Laravel Inertia</div>
              </div>
              <div class="p-2 rounded-lg bg-emerald-100 border-2 border-slate-900 text-center">
                <div class="font-mono-code text-[9px] font-bold text-slate-600">CORE ENGINE</div>
                <div id="idxM3" class="text-xs font-extrabold text-slate-900">Midtrans Iris</div>
              </div>
            </div>

            <div class="flex flex-wrap items-center justify-between gap-3 pt-3 border-t border-slate-200">
              <div id="idxTechPills" class="flex flex-wrap gap-1.5"></div>
              <button type="button" id="idxOpenModalBtn" class="nb-btn px-4 py-2 text-xs" style="background:#0284c7; color:#ffffff;">
                <span>📘</span> <span>Buka Studi Kasus</span>
              </button>
            </div>
          </div>
        </div>
      </div>

      <!-- Seabed Sand Transition with Animated Walking Crab Sprite & Seamless Gradient into Tech Stack -->
      <div id="seabedCrabTrack" class="relative w-full z-20 pointer-events-auto select-none" style="min-height: 64px;">
        <!-- Animated Walking Seabed Crab (Moving Edge-to-Edge with 2-Word Funny Quotes) -->
        <button type="button" id="seabedCrab" aria-label="Kepiting pantai" class="absolute bottom-1 left-0 w-14 h-12 p-0 border-0 bg-transparent cursor-pointer outline-none z-30 flex items-center justify-center transition-transform hover:scale-110 active:scale-95 group" title="Klik aku!">
          <img src="/images/sprites/crab.svg" alt="Kepiting pantai" class="w-12 h-10 pointer-events-none drop-shadow-[2px_3px_0px_rgba(15,23,42,0.25)] transition-transform duration-100" draggable="false" onerror="this.outerHTML='<span class=\'text-3xl\'>🦀</span>'" />
        </button>

        <div class="w-full overflow-hidden leading-none -mb-1 pointer-events-none">
          <svg viewBox="0 0 1440 90" class="w-full h-16 block" preserveAspectRatio="none">
            <defs>
              <linearGradient id="studiSandGradBack" x1="0" y1="0" x2="0" y2="1">
                <stop offset="0%" stop-color="#fde68a"/>
                <stop offset="100%" stop-color="#fef9c3"/>
              </linearGradient>
              <linearGradient id="studiSandGradFront" x1="0" y1="0" x2="0" y2="1">
                <stop offset="0%" stop-color="#fde68a"/>
                <stop offset="40%" stop-color="#fef9c3"/>
                <stop offset="100%" stop-color="#fef9c3"/>
              </linearGradient>
            </defs>
            <path fill="url(#studiSandGradBack)" stroke="#0f172a" stroke-width="3" d="M0,40 C420,90 1020,0 1440,50 L1440,90 L0,90 Z"></path>
            <path fill="url(#studiSandGradFront)" d="M0,60 C480,100 960,25 1440,65 L1440,90 L0,90 Z"></path>
          </svg>
        </div>
      </div>
    </section>

    <!-- ================= 6. SECTION TECH STACK & TOOLS ================= -->
    <section id="tech-stack" class="pt-20 pb-20 relative overflow-hidden" style="background: linear-gradient(180deg, #fef9c3 0%, #fefce8 25%, #fefce8 75%, #fef9c3 100%); margin-top: -1px;">
      <!-- Natural Layered Beach Sand Dunes, Contours & Pebbles -->
      <svg class="absolute inset-0 w-full h-full pointer-events-none z-0" viewBox="0 0 1440 1000" preserveAspectRatio="none" aria-hidden="true">
        <path d="M0,140 C360,80 720,210 1100,130 C1270,95 1370,120 1440,145" fill="none" stroke="#fde68a" stroke-width="45" opacity="0.18"/>
        <path d="M0,460 C420,530 780,380 1160,465 C1300,495 1390,470 1440,455" fill="none" stroke="#fde68a" stroke-width="45" opacity="0.15"/>
        <path d="M0,780 C380,710 820,850 1200,765 C1320,740 1390,760 1440,785" fill="none" stroke="#fde68a" stroke-width="45" opacity="0.18"/>
        <path d="M-20,175 C360,115 720,240 1100,162 C1270,128 1370,152 1460,178" fill="none" stroke="#d97706" stroke-width="2" stroke-opacity="0.13" stroke-dasharray="7 10"/>
        <path d="M-20,505 C410,570 770,425 1150,508 C1290,538 1390,512 1460,498" fill="none" stroke="#d97706" stroke-width="2" stroke-opacity="0.13" stroke-dasharray="7 10"/>
        <path d="M-20,820 C380,750 820,885 1200,805 C1320,780 1390,800 1460,824" fill="none" stroke="#d97706" stroke-width="2" stroke-opacity="0.11" stroke-dasharray="6 10"/>
        <circle cx="95" cy="240" r="3" fill="#d97706" opacity="0.18"/>
        <circle cx="118" cy="256" r="2" fill="#b45309" opacity="0.14"/>
        <circle cx="1310" cy="340" r="3.5" fill="#d97706" opacity="0.17"/>
        <circle cx="1340" cy="356" r="2" fill="#b45309" opacity="0.14"/>
        <circle cx="160" cy="880" r="3" fill="#b45309" opacity="0.16"/>
        <circle cx="1270" cy="910" r="3" fill="#d97706" opacity="0.17"/>
      </svg>
      <div class="max-w-5xl mx-auto tech-container-dashed px-4 md:px-7 relative z-10">
        <div class="flex flex-col md:flex-row md:items-end justify-between gap-4 mb-8">
          <div>
            <span class="inline-block px-3 py-1 rounded-lg bg-amber-300 border-2 border-slate-900 font-mono-code text-[11px] font-extrabold text-slate-900 shadow-[2px_2px_0px_#0f172a] mb-2">
              03 // TECH STACK
            </span>
            <h2 class="text-3xl md:text-4xl font-extrabold text-slate-900">Tech Stack &amp; Tools</h2>
            <p class="text-xs md:text-sm text-slate-600 font-medium mt-1">Teknologi dan tools yang saya gunakan untuk membangun aplikasi web dan mobile.</p>
          </div>
          <div class="nb-card-sm px-4 py-2 font-mono-code text-xs font-extrabold flex items-center gap-2 self-start md:self-end">
            <span>🛠️</span> <span id="techCountUpBadge" data-count="{{ $totalSkills }}">{{ $totalSkills }} Tools &amp; Frameworks</span>
          </div>
        </div>

        <div class="flex items-center justify-between font-mono-code text-[10px] font-extrabold text-slate-500 uppercase tracking-wider mb-2">
          <span>KATEGORI</span>
          <span>Pilih kategori utama</span>
        </div>
        <div class="grid grid-cols-2 md:grid-cols-{{ min(6, $skillCategories->count() + 1) }} gap-3 mb-8">
          <button type="button" class="stack-cat-card nb-card-sm p-3 text-left cursor-pointer transition" data-cat="all" style="background:#fde047;">
            <div class="flex items-center justify-between mb-2">
              <span class="text-base">✨</span>
              <span class="font-mono-code text-[9px] font-extrabold text-slate-600">OVERVIEW</span>
            </div>
            <div class="font-extrabold text-xs text-slate-900 mb-2">Semua Stack</div>
            <div class="h-1.5 w-full bg-slate-900/20 rounded-full overflow-hidden"><div class="h-full bg-slate-900 w-full"></div></div>
          </button>

          @php
            $catIcons = ['frontend' => '🌐', 'mobile' => '📱', 'backend' => '⚙️', 'database' => '🐬', 'devops' => '🐧'];
            $catLayers = ['frontend' => 'CLIENT', 'mobile' => 'MOBILE', 'backend' => 'SERVER', 'database' => 'DATA', 'devops' => 'INFRA'];
          @endphp
          @foreach($skillCategories as $cat)
            <button type="button" class="stack-cat-card nb-card-sm p-3 text-left cursor-pointer transition" data-cat="{{ $cat->slug }}" style="background:#ffffff;">
              <div class="flex items-center justify-between mb-2">
                <span class="text-base">{{ $catIcons[$cat->slug] ?? '⚡' }}</span>
                <span class="font-mono-code text-[9px] font-extrabold text-slate-500">{{ $catLayers[$cat->slug] ?? strtoupper($cat->short_name) }}</span>
              </div>
              <div class="font-extrabold text-xs text-slate-900 mb-2">{{ $cat->name }}</div>
              <div class="h-1.5 w-full bg-slate-200 rounded-full overflow-hidden"><div class="h-full bg-sky-500 w-4/5"></div></div>
            </button>
          @endforeach
        </div>

        <div class="flex items-center justify-between font-mono-code text-[10px] font-extrabold text-slate-500 uppercase tracking-wider mb-3">
          <span>DAFTAR KATEGORI &amp; LAYER</span>
          <span>KLIK KARTU ATAU ITEM UNTUK MELIHAT DETAIL</span>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-7">
          @php
            $bgPills = ['bg-sky-100 text-sky-800', 'bg-amber-100 text-amber-800', 'bg-emerald-100 text-emerald-800', 'bg-purple-100 text-purple-800'];
            $tagColors = ['bg-sky-50 text-sky-700', 'bg-amber-50 text-amber-700', 'bg-emerald-50 text-emerald-700', 'bg-purple-50 text-purple-700'];
          @endphp
          @foreach($skillCategories as $i => $cat)
            <div class="stack-layer-card nb-card p-6" data-layer="{{ $cat->slug }}" data-cats="all,{{ $cat->slug }}">
              <div class="layer-contour-bg"></div>
              <div class="relative z-10 flex flex-col h-full">
                <div class="flex items-center justify-between mb-3">
                  <div class="flex items-center gap-2">
                    <span class="px-2 py-0.5 rounded {{ $bgPills[$i % 4] }} border border-slate-900 font-mono-code text-[10px] font-extrabold">{{ sprintf("%02d", $i + 1) }}</span>
                    <span class="font-mono-code text-[10px] font-bold text-slate-400 uppercase">{{ $cat->layer ?? 'LAYER' }}</span>
                  </div>
                  <span class="px-2.5 py-0.5 rounded-full {{ $tagColors[$i % 4] }} border border-slate-900 font-mono-code text-[9px] font-extrabold">{{ strtoupper($cat->short_name) }}</span>
                </div>
                <h3 class="text-xl font-extrabold text-slate-900 mb-1">{{ $cat->name }}</h3>
                <p class="text-xs text-slate-600 mb-4">{{ $cat->description }}</p>
                <div class="grid grid-cols-2 sm:grid-cols-3 gap-2 mb-5">
                  @foreach($cat->skills as $sk)
                    <button type="button" class="tool-pill-btn nb-btn px-2.5 py-1.5 text-xs bg-white text-slate-900 justify-start" data-tool="{{ Str::slug($sk->name) }}">{{ $sk->name }}</button>
                  @endforeach
                </div>
                <div class="pt-3 border-t border-slate-200 flex items-center justify-between mt-auto">
                  <span class="font-mono-code text-[11px] text-slate-500 font-bold">{{ $cat->skills->count() }} Tools</span>
                  <button type="button" class="layer-detail-btn nb-btn px-3 py-1 text-[11px] {{ $i === 0 ? 'bg-amber-300' : 'bg-white' }} text-slate-900" data-target="{{ $cat->slug }}">Detail Layer →</button>
                </div>
              </div>
            </div>
          @endforeach
        </div>

        <!-- 2-Mode Interactive Inspector Panel -->
        <div id="stackInspectorCard" class="nb-card p-6 md:p-7">
          <div id="inspectorLayerMode">
            <div class="flex flex-wrap items-center justify-between gap-2 mb-2">
              <span id="inspLayerBadge" class="px-3 py-0.5 rounded bg-sky-100 border border-slate-900 font-mono-code text-[10px] font-extrabold text-sky-800">
                DETAIL KATEGORI: FRONTEND &amp; MOBILE
              </span>
              <span id="inspLayerTag" class="px-3 py-0.5 rounded-full bg-slate-100 border border-slate-900 font-mono-code text-[10px] font-bold text-slate-700">
                Web &amp; Mobile
              </span>
            </div>
            <h3 id="inspLayerTitle" class="text-2xl font-extrabold text-slate-900 mb-1.5">Frontend &amp; Web Client</h3>
            <p id="inspLayerDesc" class="text-xs md:text-sm text-slate-600 mb-5">
              Pengembangan antarmuka web dan mobile menggunakan React, TypeScript, dan Flutter dengan fokus pada interaktivitas dan performa yang responsif.
            </p>
            <div class="font-mono-code text-[10px] font-extrabold text-slate-400 uppercase tracking-widest mb-2.5">FOKUS UTAMA</div>
            <div id="inspLayerPoints" class="grid grid-cols-1 md:grid-cols-3 gap-3">
              <div class="p-3 rounded-xl bg-slate-50 border-2 border-slate-900 flex items-center gap-2.5 text-xs font-extrabold text-slate-900">
                <span class="w-5 h-5 rounded-full bg-emerald-500 text-white flex items-center justify-center text-[10px]">✔</span>
                <span>Type-safe props &amp; contracts</span>
              </div>
              <div class="p-3 rounded-xl bg-slate-50 border-2 border-slate-900 flex items-center gap-2.5 text-xs font-extrabold text-slate-900">
                <span class="w-5 h-5 rounded-full bg-emerald-500 text-white flex items-center justify-center text-[10px]">✔</span>
                <span>Aplikasi Mobile Android &amp; iOS</span>
              </div>
              <div class="p-3 rounded-xl bg-slate-50 border-2 border-slate-900 flex items-center gap-2.5 text-xs font-extrabold text-slate-900">
                <span class="w-5 h-5 rounded-full bg-emerald-500 text-white flex items-center justify-center text-[10px]">✔</span>
                <span>Desain responsif modern</span>
              </div>
            </div>
          </div>

          <div id="inspectorToolMode" class="hidden">
            <div class="flex flex-wrap items-center justify-between gap-3 mb-4">
              <div class="flex items-center gap-3">
                <div id="inspToolIcon" class="w-12 h-12 rounded-xl bg-amber-100 border-2 border-slate-900 flex items-center justify-center text-2xl font-extrabold shadow-[2px_2px_0px_#0f172a]">⚛️</div>
                <div>
                  <div class="flex items-center gap-2">
                    <h3 id="inspToolName" class="text-2xl font-extrabold text-slate-900">React</h3>
                    <span id="inspToolRole" class="px-2.5 py-0.5 rounded bg-amber-300 border border-slate-900 font-mono-code text-[10px] font-extrabold text-slate-900">UI Library</span>
                  </div>
                  <div class="font-mono-code text-xs text-sky-700 font-bold mt-0.5">
                    Bagian dari: <span id="inspToolLayer" class="underline">CLIENT UI - Frontend &amp; Web</span>
                  </div>
                </div>
              </div>
              <button type="button" id="backToLayerBtn" class="nb-btn px-3.5 py-1.5 text-xs bg-white text-slate-900">
                ← Lihat Detail Kategori
              </button>
            </div>
            <div class="p-4 rounded-xl bg-slate-50 border-2 border-slate-900 shadow-[3px_3px_0px_#0f172a]">
              <div class="font-mono-code text-[10px] font-extrabold text-sky-700 uppercase mb-1">PENGGUNAAN &amp; IMPLEMENTASI</div>
              <p id="inspToolDesc" class="text-xs md:text-sm text-slate-800 font-semibold leading-relaxed"></p>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- ================= 7. SECTION PERJALANAN & MILESTONE KUNCI ================= -->
    <section id="milestone" class="relative pb-24 water" style="background: #036194; margin-top: -1px;">

      <!-- Wave Ocean Ingress Transition entering Milestone (100% Full Width Edge-to-Edge, Smooth Organic Curve) -->
      <div class="w-full overflow-hidden leading-none relative z-10">
        <svg viewBox="0 0 1440 90" class="w-full h-16 md:h-20 block" preserveAspectRatio="none">
          <path fill="#fef9c3" d="M0,0 L1440,0 L1440,40 C980,95 420,0 0,55 Z"></path>
          <path fill="none" stroke="#ffffff" stroke-width="5" d="M0,55 C420,0 980,95 1440,40"></path>
        </svg>
      </div>

      <!-- Sweeping Depth Contour Lines (Matching Kontak & Reference) -->
      <div class="absolute inset-0 pointer-events-none overflow-hidden z-0 opacity-25">
        <svg class="w-full h-full" preserveAspectRatio="none" viewBox="0 0 1440 1800" fill="none">
          <path d="M-50,220 C320,170 650,260 1020,200 C1250,170 1380,220 1500,190" stroke="#ffffff" stroke-width="2" stroke-dasharray="8 8" />
          <path d="M-50,580 C280,620 620,540 980,600 C1220,640 1390,570 1500,590" stroke="#ffffff" stroke-width="2" stroke-dasharray="8 8" />
          <path d="M-50,980 C350,930 720,1020 1080,960 C1290,920 1410,980 1500,950" stroke="#ffffff" stroke-width="2" stroke-dasharray="8 8" />
          <path d="M-50,1380 C300,1430 660,1340 1020,1400 C1240,1440 1380,1380 1500,1410" stroke="#ffffff" stroke-width="2" stroke-dasharray="8 8" />
        </svg>
      </div>

      <div class="fx-ambient" id="milestoneAmbientSea"></div>

      <div class="max-w-4xl mx-auto px-4 md:px-8 pt-6 relative z-10">
        <!-- Section 7 Header Card (1:1 Reference Match: Full-Width, Left-Aligned, Clean Neubrutalist) -->
        <div class="nb-card p-6 sm:p-7 md:p-8 w-full mb-10 md:mb-12 text-left relative bg-white">
          <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-lg bg-amber-300 border-2 border-slate-900 font-mono-code text-[11px] font-extrabold text-slate-900 shadow-[2px_2px_0px_#0f172a] mb-3">
            <span>🟡</span> 04 // REKAM JEJAK &amp; PENGALAMAN
          </span>
          <h2 class="text-2xl sm:text-3xl md:text-3xl font-extrabold text-slate-900 mb-2 leading-tight">Perjalanan &amp; Milestone Kunci</h2>
          <p class="text-xs sm:text-sm text-slate-600 font-medium leading-relaxed max-w-2xl">
            Pendidikan sarjana informatika, program bootcamp intensif, inisiatif mandiri, dan eksplorasi keamanan siber.
          </p>
        </div>

        <!-- Floating Ocean Props matching Reference (Right Ocean Margin) -->
        <div class="absolute top-10 right-4 sm:right-8 md:right-14 z-0 pointer-events-none select-none animate-float hidden lg:block">
          <svg width="42" height="42" viewBox="0 0 48 48" class="drop-shadow-[3px_3px_0px_#0f172a]">
            <rect x="14" y="6" width="10" height="36" rx="5" fill="#fde68a" stroke="#0f172a" stroke-width="2.5" />
            <rect x="24" y="6" width="10" height="36" rx="5" fill="#fef08a" stroke="#0f172a" stroke-width="2.5" />
            <rect x="12" y="20" width="24" height="8" rx="2" fill="#ef4444" stroke="#0f172a" stroke-width="2" />
            <line x1="24" y1="28" x2="21" y2="34" stroke="#ef4444" stroke-width="3" stroke-linecap="round" />
            <line x1="24" y1="28" x2="27" y2="34" stroke="#ef4444" stroke-width="3" stroke-linecap="round" />
          </svg>
        </div>
        <div class="absolute top-32 right-6 sm:right-10 md:right-16 z-0 pointer-events-none select-none animate-boat hidden sm:block">
          <svg width="48" height="48" viewBox="0 0 48 48" class="drop-shadow-[3px_3px_0px_#0f172a]">
            <circle cx="24" cy="24" r="20" fill="#ffffff" stroke="#0f172a" stroke-width="2.5" />
            <circle cx="24" cy="24" r="9" fill="#0e8ec9" stroke="#0f172a" stroke-width="2.5" />
            <path d="M21 4.5 L21 15 M27 4.5 L27 15" stroke="#ef4444" stroke-width="3.5" stroke-linecap="round" />
            <path d="M21 33 L21 43.5 M27 33 L27 43.5" stroke="#ef4444" stroke-width="3.5" stroke-linecap="round" />
            <path d="M4.5 21 L15 21 M4.5 27 L15 27" stroke="#ef4444" stroke-width="3.5" stroke-linecap="round" />
            <path d="M33 21 L43.5 21 M33 27 L43.5 27" stroke="#ef4444" stroke-width="3.5" stroke-linecap="round" />
          </svg>
        </div>

        <!-- Timeline Container with Perfectly Centered Spine & Category Emoji Nodes -->
        <div id="milestoneTimeline" class="timeline-container relative flex flex-col gap-8 md:gap-10">
          <!-- Perfectly Centered Vertical Spine Track with Rainbow Gradient Reveal -->
          <div class="timeline-spine-track absolute left-5 md:left-6 top-5 bottom-6 w-2 md:w-2.5 -translate-x-1/2 bg-white/20 border border-white/30 backdrop-blur-xs rounded-full overflow-hidden z-0 shadow-inner">
            <div id="timelineProgressFill" class="w-full relative overflow-hidden rounded-full transition-all duration-75" style="height: 0%">
              <div class="timeline-rainbow-inner absolute top-0 left-0 w-full rounded-full"></div>
            </div>
          </div>

          @php
            $typeBadgeStyles = [
              'pendidikan' => 'bg-amber-200 text-slate-900',
              'organisasi' => 'bg-sky-200 text-slate-900',
              'pencapaian' => 'bg-pink-200 text-slate-900',
              'program' => 'bg-emerald-200 text-slate-900',
            ];
            $typeEmojis = [
              'pendidikan' => '🎓',
              'organisasi' => '🌐',
              'pencapaian' => '🏆',
              'program' => '🚀',
              'karir' => '💼',
              'sertifikasi' => '📜',
            ];
            $fallbackColors = ['bg-amber-200 text-slate-900', 'bg-sky-200 text-slate-900', 'bg-pink-200 text-slate-900', 'bg-emerald-200 text-slate-900'];
            $fallbackEmojis = ['🎓', '🌐', '🏆', '🚀'];
          @endphp

          @foreach($profile->milestones as $i => $m)
            @php
              $tKey = strtolower($m->type?->name ?? '');
              $bColor = $typeBadgeStyles[$tKey] ?? $fallbackColors[$i % 4];
              $mEmoji = $typeEmojis[$tKey] ?? $fallbackEmojis[$i % 4];
              $typeName = strtoupper($m->type?->name ?? 'PENGALAMAN');
            @endphp
            <div class="timeline-node-item relative flex items-start gap-3.5 sm:gap-4 md:gap-6 z-10">
              <!-- Node Circle centered directly on the vertical spine line -->
              <div class="node-circle shrink-0 w-10 h-10 md:w-12 md:h-12 rounded-full bg-amber-300 border-[2.5px] border-slate-900 shadow-[3px_3px_0px_#0f172a] flex items-center justify-center text-lg md:text-xl select-none z-10 transition-transform duration-300">
                {{ $mEmoji }}
              </div>

              <!-- Neubrutalist Content Card -->
              <div class="nb-card p-5 sm:p-6 md:p-8 flex-1 rounded-[22px] border-[2.5px] border-slate-900 shadow-[5px_5px_0px_#0f172a] hover:-translate-y-1 hover:shadow-[6px_6px_0px_#0f172a] transition-all duration-200 bg-white">
                <!-- Top Badges: Category Pill & Period Pill -->
                <div class="flex flex-wrap items-center justify-between gap-2 mb-3">
                  <span class="px-3 py-1 rounded-md {{ $bColor }} border-2 border-slate-900 font-mono-code text-[10.5px] font-extrabold shadow-[2px_2px_0px_#0f172a] uppercase tracking-wider">
                    {{ $typeName }}
                  </span>
                  <span class="px-2.5 py-1 rounded-md bg-white border-1.5 border-slate-900 font-mono-code text-xs font-bold text-slate-700 shadow-[1.5px_1.5px_0px_#0f172a] flex items-center gap-1.5">
                    <span>📅</span> {{ $m->period }}
                  </span>
                </div>

                <!-- Title -->
                <h3 class="text-xl md:text-2xl font-extrabold text-slate-900 leading-snug mb-1">{{ $m->title }}</h3>

                <!-- Place / Subtitle in Sky Monospace -->
                <div class="font-mono-code text-xs md:text-sm font-bold text-sky-600 mb-3">{{ $m->place }}</div>

                <!-- Description -->
                <p class="text-xs md:text-sm text-slate-600 leading-relaxed mb-4 font-medium">
                  {{ $m->description }}
                </p>

                <!-- Key Points Box -->
                @if($m->points->isNotEmpty())
                  <div class="p-3.5 sm:p-4 rounded-xl bg-slate-50 border border-slate-200/90 mb-4">
                    <div class="font-mono-code text-[10px] font-extrabold text-slate-400 uppercase tracking-wider mb-2">
                      POIN KUNCI &amp; SPESIALISASI
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-2 text-xs font-bold text-slate-700">
                      @foreach($m->points as $pt)
                        <div class="flex items-start gap-2">
                          <span class="text-emerald-600 font-extrabold leading-none mt-0.5">✔</span>
                          <span class="leading-snug">{{ $pt->body }}</span>
                        </div>
                      @endforeach
                    </div>
                  </div>
                @endif

                <!-- Tags / Tech Stack Pills -->
                @if($m->tags->isNotEmpty())
                  <div class="flex flex-wrap gap-1.5 sm:gap-2 pt-1">
                    @foreach($m->tags as $tag)
                      <span class="px-2.5 py-1 rounded-full border-1.5 border-slate-900 bg-white font-mono-code text-[11px] sm:text-xs font-bold text-slate-800 shadow-[2px_2px_0px_#0f172a] hover:bg-amber-100 transition-colors">
                        {{ $tag->name }}
                      </span>
                    @endforeach
                  </div>
                @endif
              </div>
            </div>
          @endforeach
        </div>
      </div>
    </section>

    <!-- ================= 8. SECTION KONTAK & KOLABORASI + ABYSSAL ZONE ================= -->
    <section id="kontak" class="relative pt-28 md:pt-36 pb-0 overflow-hidden" style="background: #036194;">
      <!-- Ambient Underwater Bubbles & Swimming Fish for Section 8 -->
      <div class="fx-ambient" id="kontakAmbientSea"></div>

      <!-- Sweeping Depth Contour Lines -->
      <div class="absolute inset-0 pointer-events-none overflow-hidden z-0 opacity-25">
        <svg class="w-full h-full" preserveAspectRatio="none" viewBox="0 0 1440 600" fill="none">
          <path d="M-50,150 C320,110 650,190 1020,140 C1250,110 1380,160 1500,130" stroke="#ffffff" stroke-width="2" stroke-dasharray="8 8" />
          <path d="M-50,320 C280,360 620,290 980,340 C1220,380 1390,310 1500,330" stroke="#ffffff" stroke-width="2" stroke-dasharray="8 8" />
          <path d="M-50,480 C350,450 720,510 1080,470 C1290,440 1410,490 1500,470" stroke="#ffffff" stroke-width="2" stroke-dasharray="8 8" />
        </svg>
      </div>

      <!-- Floating Yellow Mini Submarine (Bathysphere) Sprite matching Reference -->
      <div class="absolute top-20 md:top-24 right-6 md:right-16 z-0 pointer-events-none animate-submarine select-none">
        <svg width="74" height="52" viewBox="0 0 80 56" class="drop-shadow-[3px_3px_0px_#0f172a]">
          <!-- Periscope / Tower -->
          <rect x="36" y="4" width="8" height="12" fill="#facc15" stroke="#0f172a" stroke-width="2.5" rx="2" />
          <path d="M44,8 L50,8" stroke="#0f172a" stroke-width="2.5" stroke-linecap="round" />
          <circle cx="50" cy="8" r="2.5" fill="#38bdf8" stroke="#0f172a" stroke-width="1.5" />
          <!-- Main Hull -->
          <ellipse cx="40" cy="32" rx="28" ry="18" fill="#fde047" stroke="#0f172a" stroke-width="2.5" />
          <!-- Portholes / Viewports -->
          <circle cx="28" cy="32" r="5" fill="#ffffff" stroke="#0f172a" stroke-width="2" />
          <circle cx="28" cy="32" r="2.5" fill="#38bdf8" />
          <circle cx="40" cy="32" r="5" fill="#ffffff" stroke="#0f172a" stroke-width="2" />
          <circle cx="40" cy="32" r="2.5" fill="#38bdf8" />
          <circle cx="52" cy="32" r="5" fill="#ffffff" stroke="#0f172a" stroke-width="2" />
          <circle cx="52" cy="32" r="2.5" fill="#38bdf8" />
          <!-- Propeller Tail -->
          <polygon points="12,32 4,24 4,40" fill="#0284c7" stroke="#0f172a" stroke-width="2" />
          <rect x="10" y="30" width="4" height="4" fill="#0f172a" />
          <!-- Bubbles from propeller -->
          <circle cx="1" cy="28" r="1.5" fill="#ffffff" opacity="0.8" />
          <circle cx="-3" cy="34" r="2" fill="#ffffff" opacity="0.7" />
        </svg>
      </div>

      <!-- Anglerfish at lower left -->
      <div class="absolute bottom-28 left-6 pointer-events-none z-0 animate-angler opacity-85 select-none">
        <svg width="76" height="58" viewBox="0 0 80 60">
          <path d="M45,18 Q58,2 68,14" fill="none" stroke="#fde047" stroke-width="2.5"/>
          <circle cx="69" cy="15" r="5" fill="#fde047"/>
          <ellipse cx="38" cy="36" rx="22" ry="15" fill="#0ea5e9" stroke="#0f172a" stroke-width="2.5"/>
          <polygon points="16,36 4,24 6,48" fill="#0284c7" stroke="#0f172a" stroke-width="2"/>
          <circle cx="48" cy="32" r="3.5" fill="#ffffff"/>
          <circle cx="49" cy="32" r="1.5" fill="#0f172a"/>
        </svg>
      </div>

      <div class="max-w-4xl mx-auto px-4 md:px-8 relative z-10">
        <!-- Main Contact Neubrutalist Card -->
        <div class="nb-card p-6 md:p-8 mb-8">
          <div class="flex flex-wrap items-center justify-between gap-2 mb-3">
            <span class="px-3 py-1 rounded-lg bg-amber-300 border-2 border-slate-900 font-mono-code text-[11px] font-extrabold text-slate-900 shadow-[2px_2px_0px_#0f172a]">
              05 // KONTAK &amp; KOLABORASI
            </span>
            <span class="px-3 py-1 rounded-full bg-emerald-100 border-2 border-slate-900 font-mono-code text-[11px] font-extrabold text-emerald-800 flex items-center gap-1.5 shadow-[2px_2px_0px_#0f172a]">
              <span class="w-2 h-2 rounded-full bg-emerald-500 animate-ping"></span> STATUS: TERSEDIA
            </span>
          </div>

          <h2 class="text-2xl md:text-4xl font-extrabold text-slate-900 mt-2 mb-1.5 tracking-tight">Mari Berdiskusi &amp; Berkolaborasi</h2>
          <p class="text-xs md:text-sm text-slate-600 font-medium pb-5 mb-5">
            Punya ide proyek, kebutuhan rekayasa web/mobile, atau peluang kolaborasi? Hubungi saya langsung melalui kanal di bawah.
          </p>

          <div class="grid grid-cols-1 md:grid-cols-2 gap-5 items-stretch">
            <!-- Left Column: Symmetrical Cream Card matching Reference -->
            <div class="bg-[#fefce8] border-[2.5px] border-slate-900 rounded-[20px] p-5 md:p-6 shadow-[4px_4px_0px_#0f172a] flex flex-col justify-between">
              <div>
                <div class="font-mono-code text-[10px] font-extrabold text-slate-500 uppercase tracking-wider mb-2.5">PILIH TOPIK DISKUSI</div>
                <div class="flex flex-wrap gap-2 mb-6" id="contactTopics">
                  @foreach($profile->contactTopics as $i => $ct)
                    <button type="button" class="topic-pill-btn nb-btn px-3.5 py-1.5 text-xs font-bold" data-topic="{{ $ct->label }}" style="{{ $i === 0 ? 'background:#0284c7; color:#ffffff;' : 'background:#ffffff; color:#0f172a;' }}">{{ $ct->label }}</button>
                  @endforeach
                </div>
              </div>

              <div class="flex flex-col gap-3">
                @php
                  $defaultTopic = $profile->contactTopics->first()?->label ?? 'Diskusi Proyek';
                @endphp
                <a id="sendEmailCta" href="mailto:{{ $profile->email }}?subject={{ rawurlencode('Diskusi Proyek: ' . $defaultTopic) }}" class="nb-btn w-full py-3.5 text-sm font-extrabold flex items-center justify-center gap-2" style="background:#facc15; color:#0f172a;">
                  <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><line x1="22" y1="2" x2="11" y2="13"></line><polygon points="22 2 15 22 11 13 2 9 22 2"></polygon></svg>
                  <span>Kirim Email</span>
                </a>
                <button type="button" id="copyEmailCardBtn" class="nb-btn w-full py-2.5 px-4 text-xs font-bold justify-between" style="background:#ffffff; color:#0f172a;">
                  <span class="flex items-center gap-2">
                    <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path><polyline points="22,6 12,13 2,6"></polyline></svg>
                    <span id="cardEmailText">{{ $profile->email }}</span>
                  </span>
                  <span id="cardCopyIcon" class="flex items-center gap-1 font-mono-code text-[11px] text-slate-500">
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="9" y="9" width="13" height="13" rx="2" ry="2"></rect><path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"></path></svg>
                  </span>
                </button>
              </div>
            </div>

            <!-- Right Column: Symmetrical 3D Flip Card matching Reference -->
            <div class="flip-scene">
              <div id="contactFlipInner" class="flip-card-inner">
                <!-- FRONT FACE -->
                <div class="flip-face flip-face-front bg-[#fefce8] border-[2.5px] border-slate-900 rounded-[20px] p-5 md:p-6 shadow-[4px_4px_0px_#0f172a] flex flex-col justify-between">
                  <div>
                    <!-- Top Clock Pill Box matching Reference -->
                    <div class="px-4 py-3 rounded-xl bg-white border-2 border-slate-900 flex items-center justify-between mb-3 shadow-[2px_2px_0px_#0f172a]">
                      <div class="flex items-center gap-2">
                        <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><circle cx="12" cy="12" r="10"></circle><polyline points="12 6 12 12 16 14"></polyline></svg>
                        <span class="font-mono-code text-[10px] font-extrabold text-slate-500 uppercase">WAKTU LOKAL ({{ $profile->tz_label ?? 'WIB' }})</span>
                      </div>
                      <span id="wibClockDisplay" class="font-mono-code text-base md:text-lg font-extrabold text-slate-900 tracking-wider">00.00.00</span>
                    </div>
                    <div class="text-xs font-bold text-slate-600 px-1 flex items-center gap-1.5">
                      <span>📍</span> <span>{{ $profile->location }} • Remote &amp; Hybrid Ready</span>
                    </div>
                  </div>

                  <div>
                    <div class="flex items-center justify-between mb-2.5">
                      <span class="font-mono-code text-[10px] font-extrabold text-slate-500 uppercase tracking-wider">SOCIALS &amp; PROFIL</span>
                      <button type="button" id="openSecretMsgBtn" class="px-2.5 py-1 rounded-full bg-amber-200 border-1.5 border-slate-900 font-mono-code text-[10px] font-extrabold text-slate-900 shadow-[1.5px_1.5px_0px_#0f172a] hover:bg-amber-300 hover:-translate-y-0.5 active:translate-y-0.5 transition cursor-pointer flex items-center gap-1">
                        <span>Pesan Rahasia</span> <span>💬</span>
                      </button>
                    </div>
                    <div class="grid grid-cols-2 gap-2.5">
                      <a href="{{ $profile->github ?? 'https://github.com/artamaulana01' }}" target="_blank" rel="noopener" class="nb-btn py-2.5 text-xs font-extrabold" style="background:#fde047; color:#0f172a;">
                        <span>GitHub</span> <span>↗</span>
                      </a>
                      <a href="{{ $profile->linkedin ?? 'https://linkedin.com' }}" target="_blank" rel="noopener" class="nb-btn py-2.5 text-xs font-extrabold" style="background:#ffffff; color:#0f172a;">
                        <span>LinkedIn</span> <span>↗</span>
                      </a>
                    </div>
                  </div>
                </div>

                <!-- BACK FACE: SECRET MESSAGE -->
                <div class="flip-face flip-face-back bg-[#fef08a] border-[2.5px] border-slate-900 rounded-[20px] p-5 md:p-6 shadow-[4px_4px_0px_#0f172a] flex flex-col justify-between">
                  <div>
                    <div class="flex items-center gap-2 font-mono-code text-xs font-extrabold text-slate-900 uppercase mb-3">
                      <span>✨</span> <span>PESAN RAHASIA PENGEMBANG</span>
                    </div>
                    <p class="text-xs md:text-sm text-slate-800 font-semibold leading-relaxed">
                      "Terima kasih sudah menyelam sejauh ini! Saya sangat terbuka untuk obrolan santai seputar kode, web/mobile development, atau kolaborasi proyek seru bersama Anda."
                    </p>
                  </div>
                  <button type="button" id="flipBackToFrontBtn" class="nb-btn w-full py-2.5 text-xs font-bold" style="background:#ffffff; color:#0f172a;">
                    <span>↩</span> <span>Kembali ke Profil</span>
                  </button>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Footer Bar matching Reference -->
        <div class="nb-card px-6 py-4 flex flex-wrap items-center justify-between gap-4 mb-3 md:mb-4 relative z-10">
          <div class="text-xs font-extrabold text-slate-900">
            © {{ date('Y') }} {{ $profile->name }} • {{ $profile->role }}
          </div>
          <div class="font-mono-code text-xs font-bold text-slate-600 flex items-center gap-1.5">
            <span>⚡</span> <span>Built with Laravel, Blade &amp; Tailwind CSS</span>
          </div>
          <a href="#hero" data-go="hero" class="nb-btn px-4 py-2 text-xs font-extrabold" style="background:#fde047; color:#0f172a;">
            <span>Ke Atas</span> <span>↑</span>
          </a>
        </div>
      </div>

      <!-- Natural Beach Sand Seafloor at the Very Bottom (Exact Reference Match, 100% Full Width Edge-to-Edge) -->
      <div class="relative w-full overflow-hidden pointer-events-none select-none z-10 leading-none">
        <div class="relative w-full h-10 md:h-12">
          <!-- Back Subtle Sand Dune Layer -->
          <svg class="absolute bottom-0 left-0 w-full h-10 md:h-12 block" viewBox="0 0 1440 50" preserveAspectRatio="none" fill="none">
            <path d="M0,18 C280,28 560,12 840,24 C1120,34 1300,16 1440,22 L1440,60 L0,60 Z" fill="#eddba9" stroke="#0f172a" stroke-width="2.5" />
          </svg>
          <!-- Front Natural Sand Dune Layer with Neubrutalist Stroke (Exact Sampled Reference Hex #eedda7) -->
          <svg class="absolute bottom-0 left-0 w-full h-8 md:h-10 block" viewBox="0 0 1440 40" preserveAspectRatio="none" fill="none">
            <path d="M0,18 C260,10 520,24 780,16 C1040,8 1260,22 1440,14 L1440,50 L0,50 Z" fill="#eedda7" stroke="#0f172a" stroke-width="2.5" />
          </svg>
        </div>
      </div>
    </section>

    <!-- Bottom Dock Removed for Clean Mobile View -->
  </main>

  <!-- ================= CASE STUDY MODAL ================= -->
  <div id="caseStudyModal" class="fixed inset-0 z-[3000] bg-slate-950/70 hidden items-center justify-center p-4">
    <div class="nb-card w-full max-w-3xl max-h-[88vh] flex flex-col overflow-hidden">
      <div class="px-6 py-4 bg-white border-b-[3px] border-slate-900 flex items-center justify-between">
        <div>
          <div class="flex items-center gap-2 mb-1">
            <span id="modalBadgeCat" class="px-2.5 py-0.5 rounded bg-amber-300 border border-slate-900 font-mono-code text-[10px] font-extrabold text-slate-900">FULL-STACK WEB</span>
            <span class="font-mono-code text-xs font-bold text-slate-500">Studi Kasus Unggulan</span>
          </div>
          <h3 id="modalTitle" class="text-xl md:text-2xl font-extrabold text-slate-900">TokoKu (DesaMart)</h3>
          <div id="modalSubtitle" class="font-mono-code text-xs font-extrabold text-sky-600">Rural E-Commerce Platform</div>
        </div>
        <button type="button" id="closeModalXBtn" aria-label="Tutup" class="w-9 h-9 rounded-lg bg-slate-100 hover:bg-slate-200 text-slate-700 hover:text-slate-900 border-2 border-slate-900 flex items-center justify-center font-bold text-base cursor-pointer shrink-0 transition-colors" title="Tutup">
          ✕
        </button>
      </div>

      <div id="modalScrollBody" class="p-6 overflow-y-auto space-y-5 flex-1 modal-custom-scroll scroll-smooth overscroll-contain">
        <div class="rounded-xl border-2 border-slate-900 overflow-hidden">
          <div class="bg-slate-100 border-b-2 border-slate-900 px-3 py-2 flex items-center justify-between">
            <div class="flex items-center gap-1.5">
              <span class="w-2.5 h-2.5 rounded-full bg-red-400 border border-slate-900"></span>
              <span class="w-2.5 h-2.5 rounded-full bg-amber-400 border border-slate-900"></span>
              <span class="w-2.5 h-2.5 rounded-full bg-emerald-400 border border-slate-900"></span>
            </div>
            <span id="modalUrlText" class="font-mono-code text-[10px] text-slate-600">https://tokoku.app</span>
            <span class="px-2 py-0.5 rounded bg-emerald-100 border border-emerald-500 font-mono-code text-[9px] font-extrabold text-emerald-800">🔒 Production</span>
          </div>
          <div id="modalArtworkBox" class="min-h-[240px] w-full overflow-hidden bg-white"></div>
        </div>

        <div class="grid grid-cols-3 gap-3">
          <div class="p-3 rounded-xl bg-sky-100 border-2 border-slate-900 text-center">
            <div class="font-mono-code text-[9px] font-bold text-slate-600 uppercase">ARCHITECTURE</div>
            <div id="modalM1" class="text-xs font-extrabold text-slate-900 mt-0.5">Full-Stack Dev</div>
          </div>
          <div class="p-3 rounded-xl bg-amber-100 border-2 border-slate-900 text-center">
            <div class="font-mono-code text-[9px] font-bold text-slate-600 uppercase">ORCHESTRATION</div>
            <div id="modalM2" class="text-xs font-extrabold text-slate-900 mt-0.5">Laravel Inertia</div>
          </div>
          <div class="p-3 rounded-xl bg-emerald-100 border-2 border-slate-900 text-center">
            <div class="font-mono-code text-[9px] font-bold text-slate-600 uppercase">CORE ENGINE</div>
            <div id="modalM3" class="text-xs font-extrabold text-slate-900 mt-0.5">Midtrans Iris</div>
          </div>
        </div>

        <div class="p-4 rounded-xl bg-amber-50 border-2 border-slate-900 shadow-[3px_3px_0px_#0f172a]">
          <div class="font-mono-code text-[10px] font-extrabold text-amber-800 uppercase mb-1">📖 LATAR BELAKANG &amp; MANDAT PROYEK</div>
          <p id="modalMandate" class="text-xs md:text-sm text-slate-700 leading-relaxed font-medium"></p>
        </div>

        <div>
          <div class="font-mono-code text-[10px] font-extrabold text-slate-500 uppercase mb-2.5">⚡ ARSITEKTUR SISTEM &amp; EKSEKUSI TEKNIS</div>
          <div id="modalArchGrid" class="grid grid-cols-1 md:grid-cols-2 gap-3"></div>
        </div>

        <div class="p-4 rounded-xl bg-rose-50 border-2 border-slate-900 shadow-[3px_3px_0px_#0f172a]">
          <div class="font-mono-code text-[10px] font-extrabold text-rose-800 uppercase mb-1">🎯 TANTANGAN UTAMA &amp; RESOLUSI</div>
          <p id="modalChallenge" class="text-xs md:text-sm text-slate-700 leading-relaxed font-medium"></p>
        </div>

        <div>
          <div class="font-mono-code text-[10px] font-extrabold text-slate-500 uppercase mb-2">DAFTAR STACK TEKNOLOGI &amp; PROTOKOL</div>
          <div id="modalTechPills" class="flex flex-wrap gap-1.5"></div>
        </div>
      </div>
    </div>
  </div>

  <!-- ================= UNIFIED INTERACTIVE ANIMATION ENGINE ================= -->
  <script>
    document.addEventListener('DOMContentLoaded', () => {
      const hero = document.getElementById('hero');

      /* ---------------- A. WATER RIPPLES, SPLASH DROPLETS & FORWARD-SWIMMING FISH ---------------- */
      const activeRipples = [];
      const spawnRipple = (container, clientX, clientY) => {
        if (!container) return;
        const rect = container.getBoundingClientRect();
        const r = document.createElement('span');
        r.className = 'water-ripple';
        r.style.left = (clientX - rect.left) + 'px';
        r.style.top = (clientY - rect.top) + 'px';
        container.appendChild(r);
        activeRipples.push(r);
        if (activeRipples.length > 6) {
          const old = activeRipples.shift();
          if (old && old.parentNode) old.remove();
        }
        setTimeout(() => { if (r.parentNode) r.remove(); }, 750);
      };

      const spawnSplash = (container, clientX, clientY) => {
        if (!container) return;
        const rect = container.getBoundingClientRect();
        const cx = clientX - rect.left;
        const cy = clientY - rect.top;
        for (let i = 0; i < 3; i++) {
          setTimeout(() => spawnRipple(container, clientX, clientY), i * 80);
        }
        for (let i = 0; i < 8; i++) {
          const drop = document.createElement('span');
          drop.className = 'splash-drop';
          drop.style.left = cx + 'px';
          drop.style.top = cy + 'px';
          const angle = (i / 8) * Math.PI * 2;
          const dist = 24 + Math.random() * 34;
          drop.style.setProperty('--dx', (Math.cos(angle) * dist).toFixed(1) + 'px');
          drop.style.setProperty('--dy', (Math.sin(angle) * dist - 22).toFixed(1) + 'px');
          container.appendChild(drop);
          setTimeout(() => drop.remove(), 600);
        }
      };

      // Populate ambient bubbles (including crisp Neubrutalist white bubbles) & FORWARD-SWIMMING fish sprites
      ['flagshipAmbientSea', 'studyAmbientSea', 'milestoneAmbientSea', 'kontakAmbientSea'].forEach((id, sIdx) => {
        const wrap = document.getElementById(id);
        if (!wrap) return;
        const bubbleCount = id === 'flagshipAmbientSea' ? 28 : 20;
        for (let i = 0; i < bubbleCount; i++) {
          const b = document.createElement('span');
          const isNb = i % 3 === 0;
          b.className = isNb ? 'fx-bubble nb-bubble' : 'fx-bubble';
          const sz = isNb ? Math.round(8 + Math.random() * 6) : Math.round(6 + Math.random() * 14);
          b.style.cssText = `left:${Math.round(2 + Math.random() * 96)}%;width:${sz}px;height:${sz}px;animation-duration:${(9 + Math.random() * 11).toFixed(1)}s;animation-delay:-${(Math.random() * 12).toFixed(1)}s;`;
          wrap.appendChild(b);
        }
        const fishes = ['fish1.svg', 'fish2.svg', 'fish3.svg', 'fish1.svg', 'fish2.svg'];
        fishes.forEach((fn, fIdx) => {
          const fw = document.createElement('div');
          fw.className = 'fish-swimmer';
          const topP = 12 + fIdx * 17 + (sIdx * 3);
          const dur = 16 + fIdx * 4.5;
          // fIdx genap berenang kiri ke kanan (fishSwimRight, scaleX(1)), fIdx ganjil berenang kanan ke kiri (fishSwimLeft, scaleX(-1))
          const animName = fIdx % 2 === 0 ? 'fishSwimRight' : 'fishSwimLeft';
          fw.style.cssText = `width:${42 + (fIdx % 3) * 6}px;top:${topP}%;animation:${animName} ${dur}s linear infinite;animation-delay:-${fIdx * 4}s;`;
          fw.innerHTML = `<img src="/images/sprites/${fn}" alt="" class="w-full h-auto drop-shadow-[1px_2px_0px_rgba(15,23,42,0.25)]" />`;
          wrap.appendChild(fw);
        });
      });

      /* ---------------- B. SPLASH LOADER (1:1 DENGAN REFERENSI WEB PORTFOLIO) ---------------- */
      const loader = document.getElementById('loader');
      const loaderBox = document.getElementById('loaderBox');
      const loaderBar = document.getElementById('loaderBarFill');
      const loaderBubbles = document.getElementById('loaderBubbles');
      const waterRise = document.getElementById('loaderWaterRise');
      const skipBtn = document.getElementById('skip');
      const logoWrap = document.getElementById('loaderLogoWrap');
      const titleEl = document.getElementById('loaderTitle');
      const subEl = document.getElementById('loaderSub');
      const progWrap = document.getElementById('loaderProgressWrap');

      // 1. Generate floating ambient bubbles
      if (loaderBubbles) {
        for (let i = 0; i < 24; i++) {
          const b = document.createElement('span');
          b.className = 'ld-bubble';
          const sz = Math.round(6 + Math.random() * 18);
          b.style.cssText = `left:${Math.round(2 + Math.random() * 96)}%;width:${sz}px;height:${sz}px;animation-duration:${(4.5 + Math.random() * 5).toFixed(1)}s;animation-delay:-${(Math.random() * 4).toFixed(1)}s;`;
          loaderBubbles.appendChild(b);
        }
      }

      // 2. Ombak Interaktif Naik dari Bawah ke Atas (Intro Ocean Rise ~0.6s)
      if (waterRise) {
        waterRise.style.transition = 'transform 0.6s cubic-bezier(0.22, 1, 0.36, 1)';
        requestAnimationFrame(() => {
          waterRise.style.transform = 'translateY(0%)';
        });
      }

      // 3. POP UP LOGO, NAMA, ROLE & LOADING BAR SEABIS OMBAK (HALUS & SMOOTH ~580ms)
      setTimeout(() => {
        if (logoWrap) logoWrap.classList.add('popped');
        if (titleEl) titleEl.classList.add('popped');
        if (subEl) subEl.classList.add('popped');
        if (progWrap) progWrap.classList.add('popped');
      }, 580);

      // 4. Progress bar increment: Mengisi halus seabis elemen pop-up (~960ms)
      let loaderDone = false;
      let loaderAnimFrame = null;
      let loaderStartTime = null;
      const loaderDuration = 1500;

      const finishLoader = () => {
        if (loaderDone) return;
        loaderDone = true;
        if (loaderAnimFrame) cancelAnimationFrame(loaderAnimFrame);
        if (loader) {
          loader.style.pointerEvents = 'none';
          loader.classList.add('hide');
        }
        if (loaderBox) {
          loaderBox.style.pointerEvents = 'none';
        }
        document.body.classList.add('ready', 'hero-revealed');
        if (loaderBar) loaderBar.style.width = '100%';
        setTimeout(() => {
          if (loader && loader.parentNode) loader.remove();
        }, 520);
      };

      const startProgressBar = () => {
        loaderStartTime = performance.now();
        const updateLoaderProgress = now => {
          if (loaderDone) return;
          const progress = Math.min(1, (now - loaderStartTime) / loaderDuration);
          const pct = Math.round(progress * 100);
          if (loaderBar) loaderBar.style.width = pct + '%';
          if (progress < 1) {
            loaderAnimFrame = requestAnimationFrame(updateLoaderProgress);
          } else {
            setTimeout(finishLoader, 120);
          }
        };
        loaderAnimFrame = requestAnimationFrame(updateLoaderProgress);
      };

      // Mulai mengisi bar saat bar selesai pop-up (~960ms)
      setTimeout(startProgressBar, 960);

      // Hard safety timer: guarantee loader exits within 2.7s even if tab was throttled
      setTimeout(finishLoader, 2700);

      // Interactive: click skip, click loader, or scroll to fast-forward
      if (skipBtn) {
        skipBtn.addEventListener('click', e => {
          e.stopPropagation();
          cancelAnimationFrame(loaderAnimFrame);
          finishLoader();
        });
      }
      if (loader) {
        loader.addEventListener('click', e => {
          if (e.target === skipBtn) return;
          cancelAnimationFrame(loaderAnimFrame);
          finishLoader();
        });
      }
      window.addEventListener('wheel', () => {
        if (!loaderDone) {
          cancelAnimationFrame(loaderAnimFrame);
          finishLoader();
        }
      }, { passive: true, once: true });

      /* ---------------- C. NAVBAR SLIDING GLIDER & SMOOTH SCROLL ---------------- */
      const mainNav = document.getElementById('mainNav');
      const menu = document.getElementById('menu');
      const navGlider = document.getElementById('navGlider');
      const navLinks = Array.from(menu.querySelectorAll('.nav-pill-link'));
      let isProgrammaticScroll = false;
      let scrollAnimId = null;

      const updateGlider = activeLink => {
        if (!activeLink || !navGlider) return;
        navGlider.style.opacity = '1';
        navGlider.style.width = activeLink.offsetWidth + 'px';
        navGlider.style.transform = `translate3d(${activeLink.offsetLeft}px, 0, 0)`;
        navLinks.forEach(l => l.classList.toggle('active', l === activeLink));
      };

      setTimeout(() => updateGlider(navLinks[0]), 120);
      window.addEventListener('resize', () => {
        const cur = navLinks.find(l => l.classList.contains('active')) || navLinks[0];
        updateGlider(cur);
      });

      const sectionIds = ['profil', 'studi-kasus', 'tech-stack', 'milestone', 'kontak'];
      window.addEventListener('scroll', () => {
        mainNav.classList.toggle('scrolled', window.scrollY > 40);
        if (isProgrammaticScroll) return;
        let currentId = 'profil';
        sectionIds.forEach(id => {
          const el = document.getElementById(id);
          if (el && window.scrollY >= el.offsetTop - 220) currentId = id;
        });
        const match = navLinks.find(l => l.getAttribute('data-go') === currentId);
        if (match && !match.classList.contains('active')) updateGlider(match);
      }, { passive: true });

      // Mobile Menu Drawer Toggle
      const mobileMenuBtn = document.getElementById('mobileMenuBtn');
      const mobileMenuDrawer = document.getElementById('mobileMenuDrawer');
      const hamburgerIcon = document.getElementById('hamburgerIcon');
      const closeIcon = document.getElementById('closeIcon');
      if (mobileMenuBtn && mobileMenuDrawer) {
        mobileMenuBtn.addEventListener('click', () => {
          const isClosed = mobileMenuDrawer.classList.contains('hidden');
          mobileMenuDrawer.classList.toggle('hidden', !isClosed);
          if (hamburgerIcon) hamburgerIcon.classList.toggle('hidden', isClosed);
          if (closeIcon) closeIcon.classList.toggle('hidden', !isClosed);
        });
      }

      const cancelSmoothScroll = () => {
        if (scrollAnimId) {
          cancelAnimationFrame(scrollAnimId);
          scrollAnimId = null;
        }
        isProgrammaticScroll = false;
      };
      window.addEventListener('wheel', cancelSmoothScroll, { passive: true });
      window.addEventListener('touchstart', cancelSmoothScroll, { passive: true });

      const smoothScrollTo = targetY => {
        cancelSmoothScroll();
        isProgrammaticScroll = true;
        const startY = window.scrollY;
        const diff = targetY - startY;
        if (Math.abs(diff) < 2) {
          isProgrammaticScroll = false;
          return;
        }
        const duration = Math.min(820, Math.max(460, Math.abs(diff) * 0.28));
        const startTime = performance.now();
        const easeInOutCubic = t => t < 0.5 ? 4 * t * t * t : 1 - Math.pow(-2 * t + 2, 3) / 2;

        const step = now => {
          const p = Math.min(1, (now - startTime) / duration);
          window.scrollTo({ top: startY + diff * easeInOutCubic(p), behavior: 'instant' });
          if (p < 1) {
            scrollAnimId = requestAnimationFrame(step);
          } else {
            scrollAnimId = null;
            setTimeout(() => { isProgrammaticScroll = false; }, 120);
          }
        };
        scrollAnimId = requestAnimationFrame(step);
      };

      document.addEventListener('click', e => {
        const trigger = e.target.closest('[data-go]');
        if (!trigger) return;
        e.preventDefault();
        if (typeof trigger.blur === 'function') trigger.blur();
        const targetId = trigger.getAttribute('data-go');
        const targetEl = document.getElementById(targetId);
        if (!targetEl) return;

        // Close mobile drawer if open
        if (mobileMenuDrawer && !mobileMenuDrawer.classList.contains('hidden')) {
          mobileMenuDrawer.classList.add('hidden');
          if (hamburgerIcon) hamburgerIcon.classList.remove('hidden');
          if (closeIcon) closeIcon.classList.add('hidden');
        }

        // Immediately glide the active pill smoothly to the clicked nav link
        const matchLink = navLinks.find(l => l.getAttribute('data-go') === targetId);
        if (matchLink) updateGlider(matchLink);

        const navOffset = mainNav.offsetHeight || 68;
        const topY = targetId === 'hero'
          ? 0
          : Math.max(0, targetEl.getBoundingClientRect().top + window.scrollY - navOffset + 2);
        smoothScrollTo(topY);
      });

      /* ---------------- D. HERO 2D PHYSICS LETTERS + DUCK + CRAB + SEAGULL ---------------- */
      const showBubble = (target, text, duration = 2200) => {
        if (!target) return;
        let b = target.querySelector('.speech-bubble');
        if (!b) {
          b = document.createElement('div');
          b.className = 'speech-bubble';
          target.appendChild(b);
        }
        b.textContent = text;
        b.classList.add('active');
        clearTimeout(target._bTimer);
        target._bTimer = setTimeout(() => b.classList.remove('active'), duration);
      };

      const letterEls = Array.from(document.querySelectorAll('.physics-letter'));
      const letters = letterEls.map((el, i) => ({
        el, x: 0, y: 0, vx: 0, vy: 0, rot: 0, vrot: 0,
        disturbed: false, dragging: false, startX: 0, startY: 0,
        bobPhase: (i * 0.45) % (Math.PI * 2),
        bobSpeed: 1.7 + (i % 3) * 0.2
      }));

      letters.forEach(st => {
        st.el.addEventListener('pointerdown', e => {
          e.preventDefault();
          st.dragging = true;
          st.disturbed = true;
          st.startX = e.clientX - st.x;
          st.startY = e.clientY - st.y;
          st.el.setPointerCapture(e.pointerId);
          spawnRipple(hero, e.clientX, e.clientY);
        });
        st.el.addEventListener('pointermove', e => {
          if (!st.dragging) return;
          const nx = e.clientX - st.startX;
          const ny = e.clientY - st.startY;
          st.vx = (nx - st.x) * 0.5;
          st.vy = (ny - st.y) * 0.5;
          st.vrot = st.vx * 0.4;
          st.x = nx;
          st.y = ny;
        });
        st.el.addEventListener('pointerup', e => {
          if (!st.dragging) return;
          st.dragging = false;
          spawnRipple(hero, e.clientX, e.clientY);
        });
      });

      const duckBtn = document.getElementById('duck');
      let duckX = 70, duckY = 260, swimDir = 1, duckDragging = false, duckFloatingBack = false, duckOnSand = false, duckSandTimer = null;
      let duckDragStart = { x: 0, y: 0 }, lastDuckX = 0, duckTilt = 0, lastRippleTime = 0, duckDragMoved = 0, duckDownPos = { x: 0, y: 0 }, duckFromSand = false;

      const getHeroBounds = () => {
        const r = hero.getBoundingClientRect();
        const isMobile = window.innerWidth <= 767;
        let waterY;
        if (isMobile) {
          const titleEl = document.getElementById('title');
          if (titleEl) {
            const tRect = titleEl.getBoundingClientRect();
            const hRect = hero.getBoundingClientRect();
            waterY = Math.max(75, Math.round((tRect.top - hRect.top) - 50));
          } else {
            waterY = 115;
          }
        } else {
          waterY = r.height * 0.43;
        }
        return {
          width: r.width,
          waterY,
          sandY: r.height * 0.76
        };
      };
      let bounds = getHeroBounds();
      duckY = bounds.waterY;
      window.addEventListener('resize', () => {
        bounds = getHeroBounds();
        if (!duckDragging && !duckOnSand) duckY = bounds.waterY;
      });

      duckBtn.addEventListener('pointerdown', e => {
        e.preventDefault();
        clearTimeout(duckSandTimer);
        duckDragging = true;
        duckFloatingBack = false;
        duckOnSand = false;
        duckDragMoved = 0;
        duckDownPos = { x: e.clientX, y: e.clientY };
        const hRect = hero.getBoundingClientRect();
        duckDragStart.x = e.clientX - hRect.left - duckX;
        duckDragStart.y = e.clientY - hRect.top - duckY;
        lastDuckX = e.clientX;
        duckBtn.setPointerCapture(e.pointerId);
      });

      window.addEventListener('pointermove', e => {
        if (!duckDragging) return;
        duckDragMoved = Math.hypot(e.clientX - duckDownPos.x, e.clientY - duckDownPos.y);
        if (duckDragMoved > 12) {
          showBubble(duckBtn, 'Jangan seret aku terus! 🦆💢', 2000);
        }
        const hRect = hero.getBoundingClientRect();
        duckX = e.clientX - hRect.left - duckDragStart.x;
        duckY = e.clientY - hRect.top - duckDragStart.y;
        const dx = e.clientX - lastDuckX;
        lastDuckX = e.clientX;
        if (Math.abs(dx) > 0.5) swimDir = dx >= 0 ? 1 : -1;
        duckTilt = Math.max(-25, Math.min(25, dx * 1.5));

        const now = performance.now();
        if (now - lastRippleTime > 100 && duckY < bounds.sandY - 20) {
          lastRippleTime = now;
          spawnRipple(hero, e.clientX, e.clientY);
        }

        const dRect = duckBtn.getBoundingClientRect();
        const dCx = dRect.left + dRect.width / 2;
        const dCy = dRect.top + dRect.height / 2;
        letters.forEach(st => {
          const lRect = st.el.getBoundingClientRect();
          const lCx = lRect.left + lRect.width / 2;
          const lCy = lRect.top + lRect.height / 2;
          const dist = Math.hypot(lCx - dCx, lCy - dCy);
          if (dist < 78) {
            st.disturbed = true;
            const f = (78 - dist) * 0.42;
            st.vx += ((lCx - dCx) / (dist || 1)) * f;
            st.vy += ((lCy - dCy) / (dist || 1)) * f - 3.8;
            st.vrot += (lCx > dCx ? 1 : -1) * 8;
          }
        });
      });

      const releaseDuck = () => {
        if (!duckDragging) return;
        duckDragging = false;
        if (duckDragMoved < 8) {
          showBubble(duckBtn, 'Quack! Quack! 🦆', 1600);
          const r = duckBtn.getBoundingClientRect();
          spawnSplash(hero, r.left + r.width / 2, r.top + r.height);
          duckFloatingBack = true;
          duckFromSand = false;
          return;
        }
        if (duckY >= bounds.sandY - 15) {
          // Released on the sand: rest tilted briefly, then slowly float back up to water
          duckY = Math.min(duckY, bounds.sandY + 10);
          duckOnSand = true;
          duckFromSand = true;
          showBubble(duckBtn, 'Aduh nyungsep ke pasir! 🏖️', 1800);
          duckBtn.style.transform = `translate3d(${duckX.toFixed(1)}px, ${duckY.toFixed(1)}px, 0) rotate(24deg) scaleX(${swimDir})`;
          clearTimeout(duckSandTimer);
          duckSandTimer = setTimeout(() => {
            duckOnSand = false;
            duckFloatingBack = true;
          }, 1200);
        } else {
          // Released in air or water: slowly float/glide back to waterY
          duckFloatingBack = true;
          duckFromSand = duckY > bounds.waterY + 35;
        }
      };
      duckBtn.addEventListener('pointerup', releaseDuck);
      duckBtn.addEventListener('pointercancel', releaseDuck);

      const funnyCrabQuotes = [
        'Awas Capit! 🦀',
        'Capit Nakal! ✂️',
        'Permisi Lewat! 🦀',
        'Ciluk Baa! 👀',
        'Kepiting Jawa! 🦀',
        'Rebahan Dulu! 🏖️'
      ];

      const crabBtn = document.getElementById('crab');
      let crabX = Math.max(40, window.innerWidth - 220), crabDir = -1;
      if (crabBtn) {
        crabBtn.addEventListener('click', () => {
          showBubble(crabBtn, funnyCrabQuotes[Math.floor(Math.random() * funnyCrabQuotes.length)], 2000);
          crabX += crabDir * 35;
        });
      }

      // Seabed Transition Crab Setup (Walking between Studi Kasus & Tech Stack)
      const seabedCrab = document.getElementById('seabedCrab');
      let seabedCrabX = 50;
      let seabedCrabDir = 1;
      if (seabedCrab) {
        seabedCrab.addEventListener('click', () => {
          showBubble(seabedCrab, funnyCrabQuotes[Math.floor(Math.random() * funnyCrabQuotes.length)], 2000);
          seabedCrabX += seabedCrabDir * 35;
        });
      }

      document.getElementById('sailboatProp').addEventListener('click', e => {
        showBubble(e.currentTarget, 'Angin lautnya sejuk! ⛵', 2000);
      });

      const gullEl = document.getElementById('gullFlight');
      const gullQuotes = [
        'Awas kejatuhan kelapa! 🥥',
        'Psst, seret bebeknya tabrak huruf! 🦆',
        'Cie yang lagi lihat portfolio di pantai~ 🏖️',
        'Kweeek! Angin sepoi-sepoi asik nih! 🌊',
        'Terbang santai menikmati ombak~ 🕊️'
      ];
      let gullIdx = 0;

      const flySeagull = () => {
        if (!gullEl) return;
        // Variasikan ketinggian terbang antara 10% dan 18% dari atas Hero
        const baseTop = Math.round(11 + Math.random() * 8);
        gullEl.style.top = `${baseTop}%`;

        const startLeft = -140;
        const endLeft = window.innerWidth + 140;
        const start = performance.now();
        // Terbang pelan, anggun, dan stabil (~26 detik menyeberangi layar)
        const dur = 26000;

        // Munculkan balon ucapan saat burung berada di tengah perjalanan
        setTimeout(() => {
          showBubble(gullEl, gullQuotes[gullIdx++ % gullQuotes.length], 3500);
        }, 7500);

        const stepGull = now => {
          const p = Math.min(1, (now - start) / dur);
          const x = startLeft + p * (endLeft - startLeft);

          // Ayunan ketinggian sangat lembut dan stabil (hanya 10px), burung tetap tegak stabil mengepakkan sayap
          const y = Math.sin(p * Math.PI * 2) * 10;

          gullEl.style.transform = `translate3d(${x.toFixed(1)}px, ${y.toFixed(1)}px, 0)`;

          if (p < 1) {
            requestAnimationFrame(stepGull);
          } else {
            // Istirahat di luar layar sejenak sebelum terbang kembali
            setTimeout(flySeagull, 12000);
          }
        };
        requestAnimationFrame(stepGull);
      };

      if (gullEl) {
        gullEl.addEventListener('click', e => {
          e.stopPropagation();
          showBubble(gullEl, 'Kweeek! 🕊️ Lagi patroli pantai santai!', 3000);
        });
      }

      setTimeout(flySeagull, 2500);

      /* ---------------- E. PROFIL: TABS + REAL 2D GRAVITY/COLLISION FLOOD BEACH & CLOUD REBUILD ---------------- */
      const skillData = {
        @foreach($profile->expertises as $i => $e)
          "{{ $e->slug }}": {
            kicker: '&lt;/&gt; {{ sprintf("%02d", $i + 1) }} / {{ e($e->title) }}',
            title: {!! json_encode($e->title) !!},
            desc: {!! json_encode($e->description) !!},
            pills: {!! json_encode($e->skills->pluck('name')->all()) !!}
          },
        @endforeach
      };

      const skillTabs = document.querySelectorAll('.skill-tab-btn');
      const skillMainCard = document.getElementById('skillMainCard');
      let isFlooded = false;

      skillTabs.forEach(btn => {
        btn.addEventListener('click', () => {
          const key = btn.getAttribute('data-tab');
          const d = skillData[key];
          skillTabs.forEach(b => {
            const act = b === btn;
            b.style.background = act ? '#0284c7' : 'transparent';
            b.style.color = act ? '#ffffff' : '#0f172a';
            const numSpan = b.querySelector('span:first-child');
            if (numSpan) {
              numSpan.className = act ? 'font-mono-code text-[10px] opacity-80' : 'font-mono-code text-[10px] text-slate-400';
            }
          });
          skillMainCard.style.opacity = '0';
          if (!isFlooded) skillMainCard.style.transform = 'translateY(10px)';
          setTimeout(() => {
            document.getElementById('skillKicker').innerHTML = d.kicker;
            document.getElementById('skillTitle').innerHTML = d.title;
            document.getElementById('skillDesc').innerHTML = d.desc;
            document.getElementById('skillPills').innerHTML = d.pills.map(p =>
              `<span class="px-3 py-1.5 rounded-full border-2 border-slate-900 bg-slate-50 text-slate-900 text-xs font-extrabold shadow-[2px_2px_0px_#0f172a]">${p}</span>`
            ).join('');
            skillMainCard.style.opacity = '1';
            if (!isFlooded) skillMainCard.style.transform = 'translateY(0)';
          }, 140);
        });
      });

      const floodBtn = document.getElementById('floodBeachBtn');
      const tsunamiWave = document.getElementById('tsunamiWaveOverlay');
      const rebuildOverlay = document.getElementById('rebuildOverlay');
      const rebuildBar = document.getElementById('rebuildBar');
      const rebuildPct = document.getElementById('rebuildPercentText');
      const rebuildSoundBadge = document.getElementById('rebuildSoundBadge');
      const collapsibleCards = Array.from(document.querySelectorAll('.physics-collapsible'));

      // Real 2D Physics State for the 7 Profile Cards (Gravity, Floor Bounce, Throw Momentum & Knocking)
      const cardBodies = collapsibleCards.map((el, idx) => ({
        el,
        tx: 0,
        ty: 0,
        vx: 0,
        vy: 0,
        rot: 0,
        vrot: 0,
        floorY: 42 + (idx % 3) * 14,
        dragging: false,
        lastX: 0,
        lastY: 0
      }));

      cardBodies.forEach((b, idx) => {
        b.el.addEventListener('pointerdown', e => {
          if (!isFlooded) return;
          if (e.target.closest('.skill-tab-btn')) return;
          e.preventDefault();
          b.dragging = true;
          b.el.classList.remove('smooth-restore');
          b.lastX = e.clientX;
          b.lastY = e.clientY;
          b.vx = 0;
          b.vy = 0;
          b.el.setPointerCapture(e.pointerId);
        });

        b.el.addEventListener('pointermove', e => {
          if (!b.dragging || !isFlooded) return;
          const dx = e.clientX - b.lastX;
          const dy = e.clientY - b.lastY;
          b.lastX = e.clientX;
          b.lastY = e.clientY;
          b.tx += dx;
          b.ty += dy;
          b.vx = dx * 0.65;
          b.vy = dy * 0.65;
          b.vrot = dx * 0.35;
          b.rot = Math.max(-45, Math.min(45, b.rot + dx * 0.25));

          // Nudge neighboring cards when dragged into them!
          const myRect = b.el.getBoundingClientRect();
          const myCx = myRect.left + myRect.width / 2;
          const myCy = myRect.top + myRect.height / 2;
          cardBodies.forEach((other, oIdx) => {
            if (oIdx === idx || other.dragging) return;
            const oRect = other.el.getBoundingClientRect();
            const oCx = oRect.left + oRect.width / 2;
            const oCy = oRect.top + oRect.height / 2;
            const dist = Math.hypot(oCx - myCx, oCy - myCy);
            if (dist < 130) {
              const push = (130 - dist) * 0.08;
              other.vx += ((oCx - myCx) / (dist || 1)) * push;
              other.vy += ((oCy - myCy) / (dist || 1)) * push - 1.5;
              other.vrot += (oCx > myCx ? 1 : -1) * 1.8;
            }
          });
        });

        const endCardDrag = () => {
          if (!b.dragging) return;
          b.dragging = false;
        };
        b.el.addEventListener('pointerup', endCardDrag);
        b.el.addEventListener('pointercancel', endCardDrag);
      });

      // Orderly, non-overlapping collapse presets matching reference video (00:21)
      const floodPresets = [
        { tx: -12, ty: 24, vx: -1.5, vy: -2, rot: -12, vrot: -0.8, floorY: 26 }, // 0: Polaroid Photo
        { tx: 14,  ty: 14, vx: 1.5,  vy: -2, rot: 11,  vrot: 0.7,  floorY: 18 }, // 1: Unified Tab Bar (01 WEB | 02 MOBILE | 03 LINUX)
        { tx: 6,   ty: 24, vx: 1.0,  vy: -2, rot: 9,   vrot: 0.6,  floorY: 26 }, // 2: Main Expertise Card
        { tx: -10, ty: 42, vx: -1.2, vy: -2, rot: -5,  vrot: -0.5, floorY: 44 }, // 3: Mini Card 1 (Clean Architecture)
        { tx: 10,  ty: 50, vx: 1.2,  vy: -2, rot: 14,  vrot: 0.8,  floorY: 52 }, // 4: Mini Card 2 (Type-Safe Contract)
        { tx: 12,  ty: 44, vx: 1.4,  vy: -2, rot: -8,  vrot: -0.6, floorY: 46 }  // 5: Mini Card 3 (Linux Workflows)
      ];

      floodBtn.addEventListener('click', () => {
        if (!isFlooded) {
          tsunamiWave.classList.remove('sweep');
          requestAnimationFrame(() => {
            tsunamiWave.classList.add('sweep');
          });
          setTimeout(() => {
            isFlooded = true;
            document.getElementById('profil').classList.add('is-flooded');
            cardBodies.forEach((b, i) => {
              const p = floodPresets[i % floodPresets.length];
              b.el.classList.remove('smooth-restore');
              b.el.classList.add('flooded-card');
              b.tx = p.tx * 0.4;
              b.ty = 0;
              b.vx = p.vx;
              b.vy = p.vy;
              b.rot = p.rot * 0.5;
              b.vrot = p.vrot;
              b.floorY = p.floorY;
            });
            floodBtn.style.background = '#f97316';
            floodBtn.innerHTML = '<span>🔨</span> <span>Rakit Ulang</span>';
          }, 480);
          setTimeout(() => tsunamiWave.classList.remove('sweep'), 1360);
        } else {
          // Trigger Fullscreen Cloud Bubble Reconstruction Overlay (00:24-00:26)
          rebuildOverlay.classList.add('active');
          const start = performance.now();
          const totalDur = 2300;

          const stepRebuild = now => {
            const elapsed = now - start;
            let pct = 0;
            if (elapsed < 1050) pct = (elapsed / 1050) * 78;
            else if (elapsed < 1500) pct = 78 + ((elapsed - 1050) / 450) * 4;
            else pct = 82 + Math.min(18, ((elapsed - 1500) / (totalDur - 1500)) * 18);

            const rPct = Math.min(100, Math.round(pct));
            rebuildBar.style.width = rPct + '%';
            rebuildPct.textContent = rPct + '%';

            // Cycle sound badge exactly like reference video: KLANG! -> TWING! -> CRANK!
            if (rPct < 36) rebuildSoundBadge.textContent = '🔨 KLANG!';
            else if (rPct < 78) rebuildSoundBadge.textContent = '⚡ TWING!';
            else rebuildSoundBadge.textContent = '🔧 CRANK!';

            if (elapsed < totalDur) {
              requestAnimationFrame(stepRebuild);
            } else {
              isFlooded = false;
              document.getElementById('profil').classList.remove('is-flooded');
              cardBodies.forEach(b => {
                b.tx = 0; b.ty = 0; b.vx = 0; b.vy = 0; b.rot = 0; b.vrot = 0;
                b.el.classList.remove('flooded-card');
                b.el.classList.add('smooth-restore');
                b.el.style.transform = 'translate3d(0px, 0px, 0) rotate(0deg)';
              });
              floodBtn.style.background = '#0284c7';
              floodBtn.innerHTML = '<span>🌊</span> <span>Flood Beach</span>';
              setTimeout(() => rebuildOverlay.classList.remove('active'), 220);
            }
          };
          requestAnimationFrame(stepRebuild);
        }
      });

      /* ---------------- MASTER RAF LOOP (HERO + FLOODED PROFILE CARDS) ---------------- */
      let lastTick = performance.now();
      const masterTick = now => {
        const dt = Math.min((now - lastTick) / 1000, 0.05);
        lastTick = now;

        // 1. Hero Letters Physics
        letters.forEach(st => {
          if (st.dragging) {
            st.el.style.transform = `translate3d(${st.x.toFixed(1)}px, ${st.y.toFixed(1)}px, 0) rotate(${st.rot.toFixed(1)}deg) scale(1.08)`;
            return;
          }
          if (!st.disturbed) {
            const bob = Math.sin((now / 1000) * st.bobSpeed + st.bobPhase) * 2.5;
            st.el.style.transform = `translate3d(0px, ${bob.toFixed(2)}px, 0) rotate(0deg)`;
            return;
          }
          st.vy += 0.48;
          st.x += st.vx;
          st.y += st.vy;
          st.rot += st.vrot;
          st.vx *= 0.94;
          st.vrot *= 0.92;

          if (st.y > 44) {
            st.y = 44;
            st.vy *= -0.45;
            if (Math.abs(st.vy) < 0.8) st.vy = 0;
          }
          if (st.x > 260) { st.x = 260; st.vx *= -0.6; }
          if (st.x < -260) { st.x = -260; st.vx *= -0.6; }

          st.el.style.transform = `translate3d(${st.x.toFixed(1)}px, ${st.y.toFixed(1)}px, 0) rotate(${st.rot.toFixed(1)}deg)`;
        });

        // 2. Hero Rubber Duck Physics (Edge-to-Edge Swim + Smooth Slow Float-Back to Water)
        if (duckDragging) {
          duckBtn.style.transform = `translate3d(${duckX.toFixed(1)}px, ${duckY.toFixed(1)}px, 0) rotate(${duckTilt.toFixed(1)}deg) scaleX(${swimDir}) scale(1.1)`;
        } else if (duckFloatingBack) {
          const dy = bounds.waterY - duckY;
          const step = Math.sign(dy) * Math.max(28 * dt, Math.abs(dy) * Math.min(1, 2.2 * dt));
          duckY = Math.abs(dy) <= Math.abs(step) ? bounds.waterY : duckY + step;
          const duckMaxX = window.innerWidth <= 767 ? bounds.width - 56 : bounds.width - 96;
          const duckMinX = window.innerWidth <= 767 ? 14 : 24;
          duckX = Math.max(duckMinX, Math.min(duckMaxX, duckX + Math.sin(now / 260) * 18 * dt));
          const floatTilt = Math.sin(now / 220) * 6;
          if (Math.abs(bounds.waterY - duckY) < 1.5) {
            duckY = bounds.waterY;
            duckFloatingBack = false;
            if (duckFromSand) {
              showBubble(duckBtn, 'Akhirnya air! 💦', 1800);
              duckFromSand = false;
            }
            const r = duckBtn.getBoundingClientRect();
            spawnSplash(hero, r.left + r.width / 2, r.top + r.height);
          }
          duckBtn.style.transform = `translate3d(${duckX.toFixed(1)}px, ${duckY.toFixed(1)}px, 0) rotate(${floatTilt.toFixed(1)}deg) scaleX(${swimDir})`;
        } else if (!duckOnSand) {
          const duckMaxX = window.innerWidth <= 767 ? bounds.width - 56 : bounds.width - 96;
          const duckMinX = window.innerWidth <= 767 ? 14 : 24;
          duckX += swimDir * 42 * dt;
          if (duckX > duckMaxX) { duckX = duckMaxX; swimDir = -1; }
          if (duckX < duckMinX) { duckX = duckMinX; swimDir = 1; }
          const bob = Math.sin((now / 1000) * 2.8) * 4.5;
          const tilt = Math.sin((now / 1000) * 2.2) * 3;
          duckBtn.style.transform = `translate3d(${duckX.toFixed(1)}px, ${(bounds.waterY + bob).toFixed(1)}px, 0) rotate(${tilt.toFixed(1)}deg) scaleX(${swimDir})`;
        }

        // 3. Hero Crab Walk (Edge-to-Edge across the beach, safely between palm tree and lounge area on mobile)
        const isMobileScreen = window.innerWidth <= 767;
        const crabMinX = isMobileScreen ? 62 : 24;
        const crabMaxX = isMobileScreen ? bounds.width - 76 : bounds.width - 88;
        const crabScale = isMobileScreen ? 0.65 : 1;
        crabX += crabDir * (isMobileScreen ? 28 : 36) * dt;
        if (crabX > crabMaxX) { crabX = crabMaxX; crabDir = -1; }
        if (crabX < crabMinX) { crabX = crabMinX; crabDir = 1; }
        const waddle = Math.sin((now / 1000) * 7) * 2.2;
        crabBtn.style.transform = `translate3d(${crabX.toFixed(1)}px, ${waddle.toFixed(1)}px, 0) scale(${crabScale})`;

        // 3b. Seabed Transition Crab Walk (Edge-to-Edge across the sand between Studi Kasus & Tech Stack)
        if (seabedCrab) {
          const winW = window.innerWidth;
          seabedCrabX += seabedCrabDir * 42 * dt;
          if (seabedCrabX > winW - 76) {
            seabedCrabX = winW - 76;
            seabedCrabDir = -1;
          } else if (seabedCrabX < 14) {
            seabedCrabX = 14;
            seabedCrabDir = 1;
          }
          const sWaddle = Math.sin((now / 1000) * 8) * 2.2;
          const sFlip = seabedCrabDir < 0 ? -1 : 1;
          seabedCrab.style.transform = `translate3d(${seabedCrabX.toFixed(1)}px, ${sWaddle.toFixed(1)}px, 0)`;
          const crabImg = seabedCrab.querySelector('img');
          if (crabImg) crabImg.style.transform = `scaleX(${sFlip})`;
        }

        // 4. Flooded Profile Cards 2D Gravity, Throw & Bounce Physics
        if (isFlooded) {
          cardBodies.forEach(b => {
            if (b.dragging) {
              b.el.style.transform = `translate3d(${b.tx.toFixed(1)}px, ${b.ty.toFixed(1)}px, 0) rotate(${b.rot.toFixed(1)}deg) scale(1.03)`;
              return;
            }
            b.vy += 0.58; // Gravity pull down
            b.tx += b.vx;
            b.ty += b.vy;
            b.rot += b.vrot;
            b.vx *= 0.93;
            b.vrot *= 0.90;

            // Bounce on floor
            if (b.ty > b.floorY) {
              b.ty = b.floorY;
              b.vy *= -0.42;
              if (Math.abs(b.vy) < 0.7) b.vy = 0;
            }
            // Side wall bounds
            if (b.tx > 220) { b.tx = 220; b.vx *= -0.55; }
            if (b.tx < -220) { b.tx = -220; b.vx *= -0.55; }
            if (b.rot > 42) { b.rot = 42; b.vrot *= -0.5; }
            if (b.rot < -42) { b.rot = -42; b.vrot *= -0.5; }

            b.el.style.transform = `translate3d(${b.tx.toFixed(1)}px, ${b.ty.toFixed(1)}px, 0) rotate(${b.rot.toFixed(1)}deg)`;
          });
        }

        requestAnimationFrame(masterTick);
      };
      requestAnimationFrame(masterTick);

      /* ---------------- F. STUDI KASUS: STICKY SHOWCASE, FLIP FILTER & MODAL ---------------- */
      const projects = @json($projectsJs);

      let activeFlagshipIdx = 0;
      const flagshipStage = document.getElementById('flagshipCardStage');

      const renderFlagship = idx => {
        if (activeFlagshipIdx === idx && flagshipStage.dataset.rendered === 'true') return;
        activeFlagshipIdx = idx;
        const p = projects[idx];

        // Smooth subtle fade transition without layout jumping / reflow thrashing
        flagshipStage.style.opacity = '0.7';
        setTimeout(() => {
          document.getElementById('flagshipBadgeCode').textContent = p.code;
          document.getElementById('flagshipBadgeRole').textContent = p.roleBadge;
          document.getElementById('flagshipCounterText').textContent = `FLAGSHIP ${idx + 1} / ${projects.length}`;
          
          const titleEl = document.getElementById('fpTitle');
          if (p.title.includes(' (')) {
            titleEl.innerHTML = p.title.replace(' (', '<br><span class="text-xl md:text-2xl font-bold text-slate-700">(') + '</span>';
          } else {
            titleEl.textContent = p.title;
          }

          document.getElementById('fpSubtitle').textContent = p.subtitle;
          document.getElementById('fpDesc').textContent = p.desc;
          document.getElementById('fpM1Label').textContent = p.m1Label;
          document.getElementById('fpM1Val').textContent = p.m1Val;
          document.getElementById('fpM2Label').textContent = p.m2Label;
          document.getElementById('fpM2Val').textContent = p.m2Val;
          document.getElementById('fpM3Label').textContent = p.m3Label;
          document.getElementById('fpM3Val').textContent = p.m3Val;
          document.getElementById('fpUrlText').textContent = p.url;
          document.getElementById('fpPlatformBadge').textContent = p.platformBadge;
          document.getElementById('fpArtworkBox').innerHTML = p.artworkHtml;
          document.getElementById('fpTechPills').innerHTML = p.tech.map(t =>
            `<span class="px-2.5 py-1 rounded-full border-1.5 border-slate-900 bg-slate-100 font-mono-code text-slate-900 text-[11px] font-bold shadow-[2px_2px_0px_#0f172a]">${t}</span>`
          ).join('');

          const demoBtn = document.getElementById('fpLiveDemoBtn');
          if (demoBtn) {
            demoBtn.innerHTML = p.cat === 'mobile' ? '<span>📱</span> <span>Mobile Native</span>' : '<span>⚡</span> <span>Live Demo</span>';
          }

          document.querySelectorAll('.flagship-dot').forEach((d, i) => {
            d.className = i === idx
              ? 'flagship-dot w-6 h-2.5 rounded-full bg-amber-400 border border-slate-900 cursor-pointer transition-all'
              : 'flagship-dot w-2.5 h-2.5 rounded-full bg-slate-200 border border-slate-900 cursor-pointer transition-all';
          });

          flagshipStage.style.opacity = '1';
          flagshipStage.dataset.rendered = 'true';
        }, 60);
      };

      document.querySelectorAll('.flagship-dot').forEach(dot => {
        dot.addEventListener('click', e => {
          e.stopPropagation();
          renderFlagship(Number(dot.getAttribute('data-idx')));
        });
      });
      document.getElementById('flagshipCounterPill').addEventListener('click', () => {
        renderFlagship((activeFlagshipIdx + 1) % projects.length);
      });

      document.getElementById('fpMobilePrevBtn')?.addEventListener('click', () => {
        const prevIdx = (activeFlagshipIdx - 1 + projects.length) % projects.length;
        renderFlagship(prevIdx);
      });
      document.getElementById('fpMobileNextBtn')?.addEventListener('click', () => {
        const nextIdx = (activeFlagshipIdx + 1) % projects.length;
        renderFlagship(nextIdx);
      });

      const flagshipTrack = document.getElementById('flagshipScrollTrack');
      let tickingFlagshipScroll = false;
      window.addEventListener('scroll', () => {
        if (!flagshipTrack || window.innerWidth < 768) return;
        if (!tickingFlagshipScroll) {
          requestAnimationFrame(() => {
            const rect = flagshipTrack.getBoundingClientRect();
            const totalScrollable = rect.height - window.innerHeight;
            if (rect.top <= 90 && rect.bottom >= window.innerHeight * 0.45 && totalScrollable > 0) {
              const progress = Math.min(0.99, Math.max(0, (90 - rect.top) / totalScrollable));
              const targetIdx = Math.min(projects.length - 1, Math.floor(progress * projects.length));
              if (targetIdx !== activeFlagshipIdx) renderFlagship(targetIdx);
            }
            tickingFlagshipScroll = false;
          });
          tickingFlagshipScroll = true;
        }
      }, { passive: true });

      const caseModal = document.getElementById('caseStudyModal');
      const modalScrollBody = document.getElementById('modalScrollBody');
      const openCaseModal = idx => {
        const p = projects[idx];
        document.getElementById('modalBadgeCat').textContent = p.code;
        document.getElementById('modalTitle').textContent = p.title;
        document.getElementById('modalSubtitle').textContent = p.subtitle;
        document.getElementById('modalUrlText').textContent = p.url;
        document.getElementById('modalArtworkBox').innerHTML = p.artworkHtml;
        document.getElementById('modalM1').textContent = p.m1Val;
        document.getElementById('modalM2').textContent = p.m2Val;
        document.getElementById('modalM3').textContent = p.m3Val;
        document.getElementById('modalMandate').textContent = p.mandate;
        document.getElementById('modalChallenge').textContent = p.challenge;
        document.getElementById('modalArchGrid').innerHTML = p.arch.map(item => `
          <div class="p-3.5 rounded-xl bg-white border-2 border-slate-900 flex items-start gap-2.5 text-xs font-bold text-slate-800 shadow-[2px_2px_0px_#0f172a]">
            <span class="w-5 h-5 rounded-full bg-emerald-500 text-white flex items-center justify-center text-[10px] flex-shrink-0">✔</span>
            <span>${item}</span>
          </div>
        `).join('');
        document.getElementById('modalTechPills').innerHTML = p.tech.map(t =>
          `<span class="px-3 py-1 rounded-full border-1.5 border-slate-900 bg-slate-100 font-mono-code text-slate-900 text-xs font-extrabold shadow-[2px_2px_0px_#0f172a]">${t}</span>`
        ).join('');
        if (modalScrollBody) modalScrollBody.scrollTop = 0;
        caseModal.classList.remove('hidden');
        caseModal.classList.add('flex');
      };
      const closeCaseModal = () => {
        caseModal.classList.add('hidden');
        caseModal.classList.remove('flex');
      };

      document.getElementById('fpOpenModalBtn')?.addEventListener('click', () => openCaseModal(activeFlagshipIdx));
      document.getElementById('fpLiveDemoBtn')?.addEventListener('click', () => openCaseModal(activeFlagshipIdx));
      document.getElementById('fpBrowserCard')?.addEventListener('click', () => openCaseModal(activeFlagshipIdx));
      document.getElementById('closeModalXBtn')?.addEventListener('click', closeCaseModal);
      caseModal.addEventListener('click', e => { if (e.target === caseModal) closeCaseModal(); });
      document.addEventListener('keydown', e => {
        if (e.key === 'Escape' && !caseModal.classList.contains('hidden')) {
          closeCaseModal();
        }
      });

      let currentFilter = 'all';
      let selectedExplorerIdx = 0;

      const renderExplorerDetail = idx => {
        selectedExplorerIdx = idx;
        const p = projects[idx];
        const card = document.getElementById('idxDetailCard');
        card.style.opacity = '0.4';
        card.style.transform = 'translateX(10px)';
        setTimeout(() => {
          document.getElementById('idxUrlText').textContent = '🔒 ' + p.url;
          document.getElementById('idxPlatformBadge').textContent = p.platformBadge;
          document.getElementById('idxArtworkBox').innerHTML = p.artworkHtml;
          document.getElementById('idxTitle').textContent = p.title;
          const roleBadgeEl = document.getElementById('idxRoleBadge');
          if (roleBadgeEl) roleBadgeEl.textContent = p.roleBadge;
          document.getElementById('idxSubtitle').textContent = p.subtitle;
          document.getElementById('idxDesc').textContent = p.desc;
          document.getElementById('idxM1').textContent = p.m1Val;
          document.getElementById('idxM2').textContent = p.m2Val;
          document.getElementById('idxM3').textContent = p.m3Val;
          document.getElementById('idxTechPills').innerHTML = p.tech.map(t =>
            `<span class="px-2.5 py-1 rounded-full border border-slate-900 bg-slate-50 font-mono-code text-slate-900 text-[11px] font-bold shadow-[1px_1px_0px_#0f172a]">${t}</span>`
          ).join('');
          card.style.opacity = '1';
          card.style.transform = 'translateX(0)';
        }, 120);
      };

      const renderExplorerList = () => {
        const container = document.getElementById('idxListContainer');
        const filtered = projects.map((p, i) => ({ ...p, origIdx: i }))
          .filter(p => currentFilter === 'all' || p.cat === currentFilter);

        if (!filtered.some(f => f.origIdx === selectedExplorerIdx) && filtered.length > 0) {
          selectedExplorerIdx = filtered[0].origIdx;
        }

        container.innerHTML = filtered.map(item => {
          const isSel = item.origIdx === selectedExplorerIdx;
          const isPrivate = item.origIdx === 0;
          const badgeHtml = isPrivate
            ? `<span class="px-2 py-0.5 rounded-full bg-rose-100 border border-slate-900 font-mono-code text-[9px] font-extrabold text-rose-800">🔒 Private</span>`
            : `<span class="px-2 py-0.5 rounded-full bg-emerald-100 border border-slate-900 font-mono-code text-[9px] font-extrabold text-emerald-800">🔓 Open</span>`;

          const rightIconHtml = isSel
            ? `<span class="w-6 h-6 rounded-lg bg-sky-600 border border-slate-900 text-white flex items-center justify-center text-xs font-extrabold shadow-[1px_1px_0px_#0f172a]">✓</span>`
            : `<span class="w-6 h-6 rounded-lg bg-white border border-slate-900 text-slate-800 flex items-center justify-center text-xs font-extrabold shadow-[1px_1px_0px_#0f172a]">›</span>`;

          return `
            <div class="idx-item-card nb-card-sm p-4 cursor-pointer transition" data-idx="${item.origIdx}" style="background:${isSel ? '#facc15' : '#ffffff'}; color:#0f172a; border: 2.5px solid #0f172a; box-shadow: 4px 4px 0px #0f172a;">
              <div class="flex items-center justify-between mb-1">
                <span class="font-mono-code text-[10px] font-extrabold text-slate-700">${item.code}</span>
                ${badgeHtml}
              </div>
              <div class="flex items-center justify-between gap-2">
                <div class="font-extrabold text-base md:text-lg text-slate-900">${item.title}</div>
                ${rightIconHtml}
              </div>
              <div class="text-[11px] text-slate-700 font-bold mt-1">
                ${item.roleBadge} • ${item.m2Val}
              </div>
            </div>
          `;
        }).join('');

        container.querySelectorAll('.idx-item-card').forEach(card => {
          card.addEventListener('click', () => {
            selectedExplorerIdx = Number(card.getAttribute('data-idx'));
            renderExplorerList();
          });
        });

        renderExplorerDetail(selectedExplorerIdx);
      };

      document.querySelectorAll('.idx-filter-btn').forEach(btn => {
        btn.addEventListener('click', () => {
          currentFilter = btn.getAttribute('data-filter');
          document.querySelectorAll('.idx-filter-btn').forEach(b => {
            const act = b === btn;
            b.style.background = act ? '#0284c7' : '#ffffff';
            b.style.color = act ? '#ffffff' : '#0f172a';
          });
          renderExplorerList();
        });
      });

      document.getElementById('idxOpenModalBtn').addEventListener('click', () => openCaseModal(selectedExplorerIdx));
      renderFlagship(0);
      renderExplorerList();

      /* ---------------- G. TECH STACK: COUNT-UP + FILTER + 2-MODE INSPECTOR ---------------- */
      const countBadge = document.getElementById('techCountUpBadge');
      if (countBadge) {
        const obs = new IntersectionObserver(entries => {
          entries.forEach(entry => {
            if (entry.isIntersecting) {
              const target = {{ $totalSkills }};
              const start = performance.now();
              const stepC = now => {
                const p = Math.min(1, (now - start) / 800);
                countBadge.textContent = `${Math.round(p * target)} Tools & Frameworks`;
                if (p < 1) requestAnimationFrame(stepC);
              };
              requestAnimationFrame(stepC);
              obs.unobserve(entry.target);
            }
          });
        }, { threshold: 0.3 });
        obs.observe(countBadge);
      }

      const toolsDict = {
        @foreach($skillCategories as $cat)
          @foreach($cat->skills as $sk)
            "{{ Str::slug($sk->name) }}": {
              icon: '⚡',
              cat: {!! json_encode($cat->name) !!},
              title: {!! json_encode($sk->name) !!},
              part: {!! json_encode(strtoupper($cat->layer) . ' - ' . $cat->name) !!},
              desc: {!! json_encode($sk->note ?: ('Penggunaan stack ' . $sk->name . ' dalam ekosistem pengembangan aplikasi ' . $cat->name . '.')) !!}
            },
          @endforeach
        @endforeach
      };

      const layerMeta = {
        @foreach($skillCategories as $cat)
          "{{ $cat->slug }}": {
            badge: 'DETAIL KATEGORI: {{ strtoupper($cat->name) }}',
            tag: '{{ $cat->short_name }} • {{ $cat->layer }}',
            title: {!! json_encode($cat->name) !!},
            desc: {!! json_encode($cat->description) !!},
            points: {!! json_encode($cat->skills->take(3)->map(fn($s) => $s->name . ($s->note ? ' (' . $s->note . ')' : ''))->all()) !!}
          },
        @endforeach
      };

      const resetToolPills = () => {
        document.querySelectorAll('.tool-pill-btn').forEach(p => { p.style.background = '#ffffff'; });
      };

      const showLayerInspector = key => {
        resetToolPills();
        const m = layerMeta[key] || layerMeta.frontend;
        document.getElementById('inspectorToolMode').classList.add('hidden');
        document.getElementById('inspectorLayerMode').classList.remove('hidden');
        document.getElementById('inspLayerBadge').textContent = m.badge;
        document.getElementById('inspLayerTag').textContent = m.tag;
        document.getElementById('inspLayerTitle').textContent = m.title;
        document.getElementById('inspLayerDesc').textContent = m.desc;
        document.getElementById('inspLayerPoints').innerHTML = m.points.map(pt => `
          <div class="p-3 rounded-xl bg-slate-50 border-2 border-slate-900 flex items-center gap-2.5 text-xs font-extrabold text-slate-900">
            <span class="w-5 h-5 rounded-full bg-emerald-500 text-white flex items-center justify-center text-[10px]">✔</span>
            <span>${pt}</span>
          </div>
        `).join('');
      };

      document.querySelectorAll('.stack-cat-card').forEach(card => {
        card.addEventListener('click', () => {
          const cat = card.getAttribute('data-cat');
          document.querySelectorAll('.stack-cat-card').forEach(c => {
            c.style.background = c === card ? '#fde047' : '#ffffff';
          });
          document.querySelectorAll('.stack-layer-card').forEach(layer => {
            const supported = layer.getAttribute('data-cats').split(',');
            layer.classList.toggle('dimmed', !supported.includes(cat));
          });
          if (cat === 'backend') showLayerInspector('backend');
          else if (cat === 'devops') showLayerInspector('devops');
          else showLayerInspector('frontend');
        });
      });

      document.querySelectorAll('.layer-detail-btn').forEach(btn => {
        btn.addEventListener('click', () => {
          const target = btn.getAttribute('data-target');
          document.querySelectorAll('.layer-detail-btn').forEach(b => {
            b.style.background = b === btn ? '#fde047' : '#ffffff';
          });
          showLayerInspector(target);
          document.getElementById('stackInspectorCard').scrollIntoView({ behavior: 'smooth', block: 'nearest' });
        });
      });

      document.querySelectorAll('.tool-pill-btn').forEach(pill => {
        pill.addEventListener('click', () => {
          resetToolPills();
          pill.style.background = '#fde047';
          const key = pill.getAttribute('data-tool');
          const d = toolsDict[key];
          if (!d) return;
          document.getElementById('inspectorLayerMode').classList.add('hidden');
          document.getElementById('inspectorToolMode').classList.remove('hidden');
          document.getElementById('inspToolIcon').textContent = d.icon;
          document.getElementById('inspToolName').textContent = d.title;
          document.getElementById('inspToolRole').textContent = d.cat;
          document.getElementById('inspToolLayer').textContent = d.part;
          document.getElementById('inspToolDesc').textContent = d.desc;
          document.getElementById('stackInspectorCard').scrollIntoView({ behavior: 'smooth', block: 'nearest' });
        });
      });

      document.getElementById('backToLayerBtn').addEventListener('click', () => showLayerInspector('frontend'));

      /* ---------------- H. MILESTONE SCROLL-LINKED RAINBOW TIMELINE ---------------- */
      const tlContainer = document.getElementById('milestoneTimeline') || document.querySelector('.timeline-container');
      const tlFill = document.getElementById('timelineProgressFill');
      const tlTrack = document.querySelector('.timeline-spine-track');
      const tlRainbowInner = document.querySelector('.timeline-rainbow-inner');
      const tlNodes = Array.from(document.querySelectorAll('.timeline-node-item'));

      const updateTimelineScroll = () => {
        if (!tlContainer || !tlFill) return;
        const rect = tlContainer.getBoundingClientRect();
        const winH = window.innerHeight;

        // Anchor the rainbow gradient element's height to the full track height so colors match physical scroll position
        if (tlRainbowInner && tlTrack) {
          tlRainbowInner.style.height = tlTrack.offsetHeight + 'px';
        }

        const startPt = winH * 0.70;
        const totalDist = rect.height;
        if (totalDist <= 0) return;
        const traveled = startPt - rect.top;
        const prog = Math.max(0, Math.min(1, traveled / (totalDist * 0.92)));
        tlFill.style.height = (prog * 100).toFixed(1) + '%';
      };
      let tickingTimeline = false;
      const onTimelineScroll = () => {
        if (!tickingTimeline) {
          requestAnimationFrame(() => {
            updateTimelineScroll();
            tickingTimeline = false;
          });
          tickingTimeline = true;
        }
      };
      window.addEventListener('scroll', onTimelineScroll, { passive: true });
      window.addEventListener('resize', onTimelineScroll, { passive: true });
      updateTimelineScroll();

      const tlObs = new IntersectionObserver(entries => {
        entries.forEach(entry => {
          if (entry.isIntersecting) {
            const circle = entry.target.querySelector('.node-circle');
            if (circle) circle.classList.add('active');
          }
        });
      }, { threshold: 0.15, rootMargin: '0px 0px -40px 0px' });
      tlNodes.forEach(n => tlObs.observe(n));

      /* ---------------- I. KONTAK: TOPIC PILLS, WIB CLOCK, KIRIM EMAIL & "PESAN RAHASIA 💬" 3D FLIP CARD ---------------- */
      const topicBtns = document.querySelectorAll('.topic-pill-btn');
      const sendEmailCta = document.getElementById('sendEmailCta');
      let currentTopic = '{{ $profile->contactTopics->first()?->label ?? "Diskusi Proyek" }}';

      topicBtns.forEach(btn => {
        btn.addEventListener('click', () => {
          topicBtns.forEach(b => {
            const act = b === btn;
            b.style.background = act ? '#0284c7' : '#ffffff';
            b.style.color = act ? '#ffffff' : '#0f172a';
          });
          currentTopic = btn.getAttribute('data-topic') || currentTopic;
          if (sendEmailCta) {
            sendEmailCta.href = `mailto:{{ $profile->email }}?subject=${encodeURIComponent('Diskusi Proyek: ' + currentTopic)}`;
          }
        });
      });

      // Handle Kirim Email click with Gmail Web compose + native mailto fallback
      if (sendEmailCta) {
        sendEmailCta.addEventListener('click', (e) => {
          e.preventDefault();
          const email = '{{ $profile->email }}';
          const subject = `Diskusi Proyek: ${currentTopic}`;
          const gmailUrl = `https://mail.google.com/mail/?view=cm&fs=1&to=${encodeURIComponent(email)}&su=${encodeURIComponent(subject)}`;
          const mailtoUrl = `mailto:${email}?subject=${encodeURIComponent(subject)}`;

          // 1. Open Gmail Web compose in a new tab (works reliably on Chrome, Windows, Mac, Linux)
          const newWin = window.open(gmailUrl, '_blank', 'noopener,noreferrer');

          // 2. Fallback to native mailto if popup blocked or native client preferred
          if (!newWin || newWin.closed || typeof newWin.closed === 'undefined') {
            window.location.href = mailtoUrl;
          }

          // 3. Show pleasant feedback toast
          showCopyToast(`Membuka email untuk topik "${currentTopic}"... ✉️`);
        });
      }

      // Digital Clock: Guaranteed UTC+7 WIB calculation (bulletproof & never throws error)
      const updateClock = () => {
        try {
          const now = new Date();
          const utc = now.getTime() + (now.getTimezoneOffset() * 60000);
          const wib = new Date(utc + (3600000 * 7));
          const hh = String(wib.getHours()).padStart(2, '0');
          const mm = String(wib.getMinutes()).padStart(2, '0');
          const ss = String(wib.getSeconds()).padStart(2, '0');
          const el = document.getElementById('wibClockDisplay');
          if (el) el.textContent = `${hh}.${mm}.${ss}`;
        } catch (e) {
          console.error('Clock update error:', e);
        }
      };
      updateClock();
      setInterval(updateClock, 1000);

      // 3D Flip Card triggered by "Pesan Rahasia 💬" button
      const flipInner = document.getElementById('contactFlipInner');
      const openSecretBtn = document.getElementById('openSecretMsgBtn');
      const flipBackBtn = document.getElementById('flipBackToFrontBtn');

      if (openSecretBtn && flipInner) {
        openSecretBtn.addEventListener('click', e => {
          e.preventDefault();
          e.stopPropagation();
          flipInner.classList.add('is-flipped');
        });
      }
      if (flipBackBtn && flipInner) {
        flipBackBtn.addEventListener('click', e => {
          e.preventDefault();
          e.stopPropagation();
          flipInner.classList.remove('is-flipped');
        });
      }

      // Toast Notification function for Clipboard Copy
      const showCopyToast = (msg) => {
        const t = document.getElementById('copyToast');
        const m = document.getElementById('copyToastMsg');
        if (!t) return;
        if (m && msg) m.textContent = msg;
        t.classList.remove('opacity-0', 'translate-y-4', 'pointer-events-none');
        t.classList.add('opacity-100', 'translate-y-0');
        setTimeout(() => {
          t.classList.add('opacity-0', 'translate-y-4', 'pointer-events-none');
          t.classList.remove('opacity-100', 'translate-y-0');
        }, 2200);
      };

      // Robust clipboard copy with textarea fallback
      const copyEmailToClipboard = (email) => {
        if (navigator.clipboard && window.isSecureContext) {
          navigator.clipboard.writeText(email)
            .then(() => showCopyToast(`Email ${email} berhasil disalin! 📋`))
            .catch(() => fallbackCopy(email));
        } else {
          fallbackCopy(email);
        }
      };

      const fallbackCopy = (text) => {
        const ta = document.createElement('textarea');
        ta.value = text;
        ta.style.position = 'fixed';
        ta.style.left = '-9999px';
        ta.style.top = '-9999px';
        document.body.appendChild(ta);
        ta.focus();
        ta.select();
        try {
          document.execCommand('copy');
          showCopyToast(`Email ${text} berhasil disalin! 📋`);
        } catch (e) {
          console.error('Fallback copy error:', e);
        }
        ta.remove();
      };

      // Bind Copy Buttons
      const navCopyBtn = document.getElementById('copyMail');
      if (navCopyBtn) {
        navCopyBtn.addEventListener('click', () => {
          copyEmailToClipboard('{{ $profile->email }}');
          const navText = document.getElementById('navEmailText');
          if (navText) {
            const orig = navText.textContent;
            navText.textContent = 'Tersalin ✓';
            setTimeout(() => { navText.textContent = orig; }, 1800);
          }
        });
      }

      const cardCopyBtn = document.getElementById('copyEmailCardBtn');
      if (cardCopyBtn) {
        cardCopyBtn.addEventListener('click', () => {
          copyEmailToClipboard('{{ $profile->email }}');
          const iconSpan = document.getElementById('cardCopyIcon');
          if (iconSpan) {
            const orig = iconSpan.innerHTML;
            iconSpan.innerHTML = '<span class="text-emerald-700 font-extrabold">✓ Disalin</span>';
            setTimeout(() => { iconSpan.innerHTML = orig; }, 1800);
          }
        });
      }
    });
  </script>

  <!-- Floating Toast Notification for Copy Email -->
  <div id="copyToast" class="fixed bottom-6 right-6 z-[9999] pointer-events-none opacity-0 translate-y-4 transition-all duration-300">
    <div class="px-4 py-2.5 rounded-xl bg-amber-300 border-[2.5px] border-slate-900 shadow-[4px_4px_0px_#0f172a] font-mono-code text-xs font-extrabold text-slate-900 flex items-center gap-2">
      <span>📋</span>
      <span id="copyToastMsg">Email berhasil disalin ke clipboard!</span>
    </div>
  </div>
</body>
</html>














