<div class="form-row">
    <div class="form-group">
        <label for="name" class="form-label">Nama Kategori Proyek <span class="required">*</span></label>
        <input type="text" name="name" id="name" class="form-input" data-source-title value="{{ old('name', $category->name) }}" required placeholder="contoh: Web Developer, Mobile Flutter">
        @error('name') <span class="form-error">{{ $message }}</span> @enderror
    </div>

    <div class="form-group">
        <label for="slug" class="form-label">Slug <span class="required">*</span></label>
        <input type="text" name="slug" id="slug" class="form-input" data-target-slug value="{{ old('slug', $category->slug) }}" required placeholder="contoh: web, mobile">
        @error('slug') <span class="form-error">{{ $message }}</span> @enderror
    </div>
</div>

