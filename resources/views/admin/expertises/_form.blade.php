<div class="form-row">
    <div class="form-group">
        <label for="label" class="form-label">Label Tab <span class="required">*</span></label>
        <input type="text" name="label" id="label" class="form-input" data-source-title value="{{ old('label', $expertise->label) }}" required placeholder="contoh: Web">
        @error('label') <span class="form-error">{{ $message }}</span> @enderror
    </div>

    <div class="form-group">
        <label for="slug" class="form-label">Slug <span class="required">*</span></label>
        <input type="text" name="slug" id="slug" class="form-input" data-target-slug value="{{ old('slug', $expertise->slug) }}" required placeholder="contoh: web">
        @error('slug') <span class="form-error">{{ $message }}</span> @enderror
    </div>

    <div class="form-group">
        <label for="sort_order" class="form-label">Urutan Tampil</label>
        <input type="number" name="sort_order" id="sort_order" class="form-input" value="{{ old('sort_order', $expertise->sort_order ?? 0) }}" min="0">
        @error('sort_order') <span class="form-error">{{ $message }}</span> @enderror
    </div>
</div>

<div class="form-group">
    <label for="title" class="form-label">Judul Bidang Keahlian <span class="required">*</span></label>
    <input type="text" name="title" id="title" class="form-input" value="{{ old('title', $expertise->title) }}" required placeholder="contoh: Web Development">
    @error('title') <span class="form-error">{{ $message }}</span> @enderror
</div>

<div class="form-group">
    <label for="description" class="form-label">Deskripsi Lengkap <span class="required">*</span></label>
    <textarea name="description" id="description" class="form-textarea" rows="4" required placeholder="Jelaskan fokus dan keunggulan pada bidang ini...">{{ old('description', $expertise->description) }}</textarea>
    @error('description') <span class="form-error">{{ $message }}</span> @enderror
</div>

<div class="form-group">
    <label class="form-label">Pilih Skill yang Terkait (Many-to-Many ke Pivot)</label>
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

