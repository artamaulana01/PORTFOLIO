<div class="form-row">
    <div class="form-group" style="flex: 2;">
        <label for="title" class="form-label">Judul Proyek <span class="required">*</span></label>
        <input type="text" name="title" id="title" class="form-input" data-source-title value="{{ old('title', $project->title) }}" required placeholder="contoh: TokoKu, VillaKu, KaloriKu">
        @error('title') <span class="form-error">{{ $message }}</span> @enderror
    </div>

    <div class="form-group" style="flex: 1.5;">
        <label for="slug" class="form-label">Slug <span class="required">*</span></label>
        <input type="text" name="slug" id="slug" class="form-input" data-target-slug value="{{ old('slug', $project->slug) }}" required placeholder="contoh: tokoku">
        @error('slug') <span class="form-error">{{ $message }}</span> @enderror
    </div>

    <div class="form-group" style="flex: 1.5;">
        <label for="project_category_id" class="form-label">Kategori Proyek <span class="required">*</span></label>
        <select name="project_category_id" id="project_category_id" class="form-select" required>
            <option value="">-- Pilih Kategori --</option>
            @foreach ($categories as $cat)
                <option value="{{ $cat->id }}" {{ old('project_category_id', $project->project_category_id) == $cat->id ? 'selected' : '' }}>
                    {{ $cat->name }}
                </option>
            @endforeach
        </select>
        @error('project_category_id') <span class="form-error">{{ $message }}</span> @enderror
    </div>
</div>

<div class="form-row">
    <div class="form-group">
        <label for="subtitle" class="form-label">Subjudul Singkat <span class="required">*</span></label>
        <input type="text" name="subtitle" id="subtitle" class="form-input" value="{{ old('subtitle', $project->subtitle) }}" required placeholder="contoh: Platform e-commerce lokal untuk UMKM desa">
        @error('subtitle') <span class="form-error">{{ $message }}</span> @enderror
    </div>

    <div class="form-group">
        <label for="meta" class="form-label">Teks Meta (Stack & Peran) <span class="required">*</span></label>
        <input type="text" name="meta" id="meta" class="form-input" value="{{ old('meta', $project->meta) }}" required placeholder="contoh: Web Developer • Laravel">
        @error('meta') <span class="form-error">{{ $message }}</span> @enderror
    </div>
</div>

<div class="form-row">
    <div class="form-group">
        <label for="url" class="form-label">URL Demo / Aplikasi (Bila Ada)</label>
        <input type="text" name="url" id="url" class="form-input" value="{{ old('url', $project->url) }}" placeholder="https://tokoku.app atau app://...">
        @error('url') <span class="form-error">{{ $message }}</span> @enderror
    </div>

    <div class="form-group">
        <label for="github_url" class="form-label">URL Repository GitHub</label>
        <input type="url" name="github_url" id="github_url" class="form-input" value="{{ old('github_url', $project->github_url) }}" placeholder="https://github.com/username/repo">
        @error('github_url') <span class="form-error">{{ $message }}</span> @enderror
    </div>

    <div class="form-group">
        <label for="color" class="form-label">Kode Warna Tema <span class="required">*</span></label>
        <div style="display: flex; gap: 0.5rem; align-items: center;">
            <input type="color" id="colorPicker" value="{{ old('color', $project->color ?? '#0e86c4') }}" style="width: 48px; height: 42px; border: 2px solid var(--ink); border-radius: 8px; cursor: pointer;" oninput="document.getElementById('color').value = this.value">
            <input type="text" name="color" id="color" class="form-input" value="{{ old('color', $project->color ?? '#0e86c4') }}" required placeholder="#0e86c4" oninput="document.getElementById('colorPicker').value = this.value">
        </div>
        @error('color') <span class="form-error">{{ $message }}</span> @enderror
    </div>

    <div class="form-group">
        <label for="sort_order" class="form-label">Urutan</label>
        <input type="number" name="sort_order" id="sort_order" class="form-input" value="{{ old('sort_order', $project->sort_order ?? 0) }}" min="0">
        @error('sort_order') <span class="form-error">{{ $message }}</span> @enderror
    </div>
</div>

<div class="form-group">
    <label for="summary" class="form-label">Ringkasan Proyek (Card Summary) <span class="required">*</span></label>
    <textarea name="summary" id="summary" class="form-textarea" rows="3" required placeholder="Deskripsi ringkas yang tampil di kartu utama...">{{ old('summary', $project->summary) }}</textarea>
    @error('summary') <span class="form-error">{{ $message }}</span> @enderror
</div>

<div class="form-group">
    <label for="background" class="form-label">Latar Belakang & Mandat Proyek (Modal Studi Kasus) <span class="required">*</span></label>
    <textarea name="background" id="background" class="form-textarea" rows="4" required placeholder="Jelaskan masalah, konteks, dan tujuan pembuatan proyek ini...">{{ old('background', $project->background) }}</textarea>
    @error('background') <span class="form-error">{{ $message }}</span> @enderror
</div>

<div class="form-group">
    <label for="image" class="form-label">Tangkapan Layar / Gambar Proyek</label>
    <input type="file" name="image" id="image" class="form-input" accept="image/jpeg,image/png,image/webp,image/svg+xml">
    <span class="form-help">Jika dikosongkan, kartu proyek akan menggunakan layar gradien warna bawaan tema. Format: JPG, PNG, WEBP, SVG. Maksimal 2 MB.</span>
    @error('image') <span class="form-error">{{ $message }}</span> @enderror

    @if ($project->image_path)
        <div style="margin-top: 0.8rem; display: flex; align-items: center; gap: 0.8rem;">
            <img src="{{ asset($project->image_path) }}" alt="Tangkapan layar proyek" style="width: 120px; height: 70px; border-radius: 8px; border: 2px solid var(--ink); object-fit: cover;">
            <span style="font-size: 0.78rem; color: #4b5563;">File saat ini: <code>{{ $project->image_path }}</code></span>
        </div>
    @endif
</div>

<div class="form-group">
    <label class="form-label">Teknologi / Skill Terkait (Chips)</label>
    <div class="checkbox-grid">
        @foreach ($skills as $s)
            <label class="checkbox-label">
                <input type="checkbox" name="skills[]" value="{{ $s->id }}" {{ in_array($s->id, old('skills', $selectedSkills ?? [])) ? 'checked' : '' }}>
                <span>{{ $s->name }} <small style="color: #6b7280;">({{ $s->category->short_name ?? '' }})</small></span>
            </label>
        @endforeach
    </div>
    @error('skills') <span class="form-error">{{ $message }}</span> @enderror
</div>

<hr style="margin: 2rem 0; border: none; border-top: 2px solid #e5e7eb;">

<!-- BARIS DINAMIS: Project Infos (Label & Value) -->
<div class="form-group">
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 0.6rem;">
        <div>
            <label class="form-label" style="margin-bottom: 0;">Metadata Info Baris (3 Kotak Info)</label>
            <span class="form-help">Kotak ringkasan kecil di kartu dan modal (misal: Peran, Arsitektur, Pembayaran).</span>
        </div>
        <button type="button" class="btn btn-sm btn-ghost" data-add-row="infosContainer">
            <span>+</span> Tambah Baris Info
        </button>
    </div>

    <div id="infosContainer">
        @php
            $rawInfos = old('infos', $project->infos->map(fn($i) => ['label' => $i->label, 'value' => $i->value])->all());
            if (empty($rawInfos)) {
                $rawInfos = [['label' => '', 'value' => '']];
            }
        @endphp

        @foreach ($rawInfos as $idx => $inf)
            <div class="dynamic-item">
                <input type="text" name="infos[{{ $idx }}][label]" class="form-input" style="flex: 1;" placeholder="Label (mis: Peran)" value="{{ $inf['label'] ?? '' }}">
                <input type="text" name="infos[{{ $idx }}][value]" class="form-input" style="flex: 2;" placeholder="Nilai (mis: Full-Stack Developer)" value="{{ $inf['value'] ?? '' }}">
                <button type="button" class="btn-del-row" data-del-row title="Hapus baris">✕</button>
            </div>
        @endforeach
    </div>

    <!-- Template JS untuk Tambah Baris Info -->
    <template id="infosContainerTemplate">
        <div class="dynamic-item">
            <input type="text" name="infos[__INDEX__][label]" class="form-input" style="flex: 1;" placeholder="Label (mis: Peran)">
            <input type="text" name="infos[__INDEX__][value]" class="form-input" style="flex: 2;" placeholder="Nilai (mis: Web Developer)">
            <button type="button" class="btn-del-row" data-del-row title="Hapus baris">✕</button>
        </div>
    </template>
</div>

<hr style="margin: 2rem 0; border: none; border-top: 2px solid #e5e7eb;">

<!-- BARIS DINAMIS: Project Points (Arsitektur & Poin Teknis) -->
<div class="form-group">
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 0.6rem;">
        <div>
            <label class="form-label" style="margin-bottom: 0;">Poin Arsitektur & Eksekusi Teknis (Daftar Centang Modal)</label>
            <span class="form-help">Poin-poin arsitektur sistem dan tantangan teknis yang berhasil dipecahkan.</span>
        </div>
        <button type="button" class="btn btn-sm btn-ghost" data-add-row="pointsContainer">
            <span>+</span> Tambah Poin Teknis
        </button>
    </div>

    <div id="pointsContainer">
        @php
            $rawPoints = old('points', $project->points->map(fn($p) => ['body' => $p->body])->all());
            if (empty($rawPoints)) {
                $rawPoints = [['body' => '']];
            }
        @endphp

        @foreach ($rawPoints as $idx => $pt)
            <div class="dynamic-item">
                <input type="text" name="points[{{ $idx }}][body]" class="form-input" style="flex: 1;" placeholder="Deskripsi poin arsitektur teknis..." value="{{ $pt['body'] ?? '' }}">
                <button type="button" class="btn-del-row" data-del-row title="Hapus baris">✕</button>
            </div>
        @endforeach
    </div>

    <!-- Template JS untuk Tambah Poin Teknis -->
    <template id="pointsContainerTemplate">
        <div class="dynamic-item">
            <input type="text" name="points[__INDEX__][body]" class="form-input" style="flex: 1;" placeholder="Deskripsi poin arsitektur teknis...">
            <button type="button" class="btn-del-row" data-del-row title="Hapus baris">✕</button>
        </div>
    </template>
</div>

