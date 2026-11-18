<div class="form-row">
    <div class="form-group" style="flex: 2;">
        <label for="title" class="form-label">Judul Prinsip Kerja <span class="required">*</span></label>
        <input type="text" name="title" id="title" class="form-input" value="{{ old('title', $principle->title) }}" required placeholder="contoh: Clean Architecture">
        @error('title') <span class="form-error">{{ $message }}</span> @enderror
    </div>

    <div class="form-group" style="flex: 1;">
        <label for="sort_order" class="form-label">Urutan</label>
        <input type="number" name="sort_order" id="sort_order" class="form-input" value="{{ old('sort_order', $principle->sort_order ?? 0) }}" min="0">
        @error('sort_order') <span class="form-error">{{ $message }}</span> @enderror
    </div>
</div>

<div class="form-group">
    <label for="description" class="form-label">Deskripsi Prinsip <span class="required">*</span></label>
    <textarea name="description" id="description" class="form-textarea" rows="3" required placeholder="Jelaskan prinsip kerja atau filosofi engineering ini...">{{ old('description', $principle->description) }}</textarea>
    @error('description') <span class="form-error">{{ $message }}</span> @enderror
</div>

