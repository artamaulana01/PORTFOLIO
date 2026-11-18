<div class="form-row">
    <div class="form-group" style="flex: 2;">
        <label for="label" class="form-label">Label Topik Diskusi <span class="required">*</span></label>
        <input type="text" name="label" id="label" class="form-input" value="{{ old('label', $topic->label) }}" required placeholder="contoh: Proyek Web, Mobile App, Diskusi Santai">
        @error('label') <span class="form-error">{{ $message }}</span> @enderror
    </div>

    <div class="form-group" style="flex: 1;">
        <label for="sort_order" class="form-label">Urutan</label>
        <input type="number" name="sort_order" id="sort_order" class="form-input" value="{{ old('sort_order', $topic->sort_order ?? 0) }}" min="0">
        @error('sort_order') <span class="form-error">{{ $message }}</span> @enderror
    </div>
</div>

