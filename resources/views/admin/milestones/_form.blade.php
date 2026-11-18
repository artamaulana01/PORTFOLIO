<div class="form-row">
    <div class="form-group" style="flex: 2;">
        <label for="title" class="form-label">Judul Riwayat / Milestone <span class="required">*</span></label>
        <input type="text" name="title" id="title" class="form-input" value="{{ old('title', $milestone->title) }}" required placeholder="contoh: S1 Teknik Informatika, Juara 1 Hackathon">
        @error('title') <span class="form-error">{{ $message }}</span> @enderror
    </div>

    <div class="form-group" style="flex: 1.5;">
        <label for="milestone_type_id" class="form-label">Tipe Milestone <span class="required">*</span></label>
        <select name="milestone_type_id" id="milestone_type_id" class="form-select" required>
            <option value="">-- Pilih Tipe --</option>
            @foreach ($types as $tp)
                <option value="{{ $tp->id }}" {{ old('milestone_type_id', $milestone->milestone_type_id) == $tp->id ? 'selected' : '' }}>
                    {{ $tp->name }}
                </option>
            @endforeach
        </select>
        @error('milestone_type_id') <span class="form-error">{{ $message }}</span> @enderror
    </div>
</div>

<div class="form-row">
    <div class="form-group">
        <label for="place" class="form-label">Tempat / Instansi / Penyelenggara <span class="required">*</span></label>
        <input type="text" name="place" id="place" class="form-input" value="{{ old('place', $milestone->place) }}" required placeholder="contoh: Universitas Muhammadiyah Sukabumi">
        @error('place') <span class="form-error">{{ $message }}</span> @enderror
    </div>

    <div class="form-group">
        <label for="period" class="form-label">Periode Waktu <span class="required">*</span></label>
        <input type="text" name="period" id="period" class="form-input" value="{{ old('period', $milestone->period) }}" required placeholder="contoh: 2024 - Sekarang, Feb 2026 - Jul 2026">
        @error('period') <span class="form-error">{{ $message }}</span> @enderror
    </div>

    <div class="form-group" style="flex: 0.7;">
        <label for="sort_order" class="form-label">Urutan</label>
        <input type="number" name="sort_order" id="sort_order" class="form-input" value="{{ old('sort_order', $milestone->sort_order ?? 0) }}" min="0">
        @error('sort_order') <span class="form-error">{{ $message }}</span> @enderror
    </div>
</div>

<div class="form-group">
    <label for="description" class="form-label">Deskripsi Rinci <span class="required">*</span></label>
    <textarea name="description" id="description" class="form-textarea" rows="3" required placeholder="Jelaskan peran, capaian, atau ringkasan kegiatan...">{{ old('description', $milestone->description) }}</textarea>
    @error('description') <span class="form-error">{{ $message }}</span> @enderror
</div>

<hr style="margin: 2rem 0; border: none; border-top: 2px solid #e5e7eb;">

<!-- BARIS DINAMIS: Milestone Points (Poin Rincian) -->
<div class="form-group">
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 0.6rem;">
        <div>
            <label class="form-label" style="margin-bottom: 0;">Poin Capaian & Aktivitas Utama (Centang)</label>
            <span class="form-help">Poin-poin spesifik yang dicapai atau dipelajari selama periode ini.</span>
        </div>
        <button type="button" class="btn btn-sm btn-ghost" data-add-row="mPointsContainer">
            <span>+</span> Tambah Poin
        </button>
    </div>

    <div id="mPointsContainer">
        @php
            $rawPoints = old('points', $milestone->points->map(fn($p) => ['body' => $p->body])->all());
            if (empty($rawPoints)) {
                $rawPoints = [['body' => '']];
            }
        @endphp

        @foreach ($rawPoints as $idx => $pt)
            <div class="dynamic-item">
                <input type="text" name="points[{{ $idx }}][body]" class="form-input" style="flex: 1;" placeholder="Tuliskan poin capaian..." value="{{ $pt['body'] ?? '' }}">
                <button type="button" class="btn-del-row" data-del-row title="Hapus baris">✕</button>
            </div>
        @endforeach
    </div>

    <!-- Template JS Tambah Poin Milestone -->
    <template id="mPointsContainerTemplate">
        <div class="dynamic-item">
            <input type="text" name="points[__INDEX__][body]" class="form-input" style="flex: 1;" placeholder="Tuliskan poin capaian...">
            <button type="button" class="btn-del-row" data-del-row title="Hapus baris">✕</button>
        </div>
    </template>
</div>

<hr style="margin: 2rem 0; border: none; border-top: 2px solid #e5e7eb;">

<!-- BARIS DINAMIS: Milestone Tags (Tag Keahlian / Keterampilan) -->
<div class="form-group">
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 0.6rem;">
        <div>
            <label class="form-label" style="margin-bottom: 0;">Tag Keterampilan & Topik (Chips)</label>
            <span class="form-help">Tag kata kunci (misal: Database, SQL, Algoritma, Kerja Tim).</span>
        </div>
        <button type="button" class="btn btn-sm btn-ghost" data-add-row="mTagsContainer">
            <span>+</span> Tambah Tag
        </button>
    </div>

    <div id="mTagsContainer">
        @php
            $rawTags = old('tags', $milestone->tags->pluck('name')->all());
            if (empty($rawTags)) {
                $rawTags = [''];
            }
        @endphp

        @foreach ($rawTags as $idx => $tag)
            <div class="dynamic-item" style="max-width: 400px;">
                <input type="text" name="tags[]" class="form-input" style="flex: 1;" placeholder="Nama tag..." value="{{ $tag }}">
                <button type="button" class="btn-del-row" data-del-row title="Hapus tag">✕</button>
            </div>
        @endforeach
    </div>

    <!-- Template JS Tambah Tag Milestone -->
    <template id="mTagsContainerTemplate">
        <div class="dynamic-item" style="max-width: 400px;">
            <input type="text" name="tags[]" class="form-input" style="flex: 1;" placeholder="Nama tag...">
            <button type="button" class="btn-del-row" data-del-row title="Hapus tag">✕</button>
        </div>
    </template>
</div>

