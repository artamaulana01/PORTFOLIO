<div class="form-row">
    <div class="form-group">
        <label for="name" class="form-label">Nama Kategori <span class="required">*</span></label>
        <input type="text" name="name" id="name" class="form-input" data-source-title value="{{ old('name', $category->name) }}" required placeholder="contoh: Frontend & Web">
        @error('name') <span class="form-error">{{ $message }}</span> @enderror
    </div>

    <div class="form-group">
        <label for="short_name" class="form-label">Nama Pendek (Tab Filter) <span class="required">*</span></label>
        <input type="text" name="short_name" id="short_name" class="form-input" value="{{ old('short_name', $category->short_name) }}" required placeholder="contoh: Frontend">
        @error('short_name') <span class="form-error">{{ $message }}</span> @enderror
    </div>
</div>

<div class="form-row">
    <div class="form-group">
        <label for="slug" class="form-label">Slug <span class="required">*</span></label>
        <input type="text" name="slug" id="slug" class="form-input" data-target-slug value="{{ old('slug', $category->slug) }}" required placeholder="contoh: frontend">
        @error('slug') <span class="form-error">{{ $message }}</span> @enderror
    </div>

    <div class="form-group">
        <label for="layer" class="form-label">Label Layer / Lapisan <span class="required">*</span></label>
        <input type="text" name="layer" id="layer" class="form-input" value="{{ old('layer', $category->layer) }}" required placeholder="contoh: Client UI & Mobile">
        @error('layer') <span class="form-error">{{ $message }}</span> @enderror
    </div>

    <div class="form-group">
        <label for="sort_order" class="form-label">Urutan</label>
        <input type="number" name="sort_order" id="sort_order" class="form-input" value="{{ old('sort_order', $category->sort_order ?? 0) }}" min="0">
        @error('sort_order') <span class="form-error">{{ $message }}</span> @enderror
    </div>
</div>

<div class="form-group">
    <label for="description" class="form-label">Deskripsi Kategori <span class="required">*</span></label>
    <textarea name="description" id="description" class="form-textarea" rows="3" required placeholder="Jelaskan cakupan teknologi di kategori ini...">{{ old('description', $category->description) }}</textarea>
    @error('description') <span class="form-error">{{ $message }}</span> @enderror
</div>

