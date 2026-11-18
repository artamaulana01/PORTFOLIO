<div class="form-row">
    <div class="form-group" style="flex: 1.5;">
        <label for="skill_category_id" class="form-label">Kategori Skill <span class="required">*</span></label>
        <select name="skill_category_id" id="skill_category_id" class="form-select" required>
            <option value="">-- Pilih Kategori --</option>
            @foreach ($categories as $cat)
                <option value="{{ $cat->id }}" {{ old('skill_category_id', $skill->skill_category_id) == $cat->id ? 'selected' : '' }}>
                    {{ $cat->name }} ({{ $cat->layer }})
                </option>
            @endforeach
        </select>
        @error('skill_category_id') <span class="form-error">{{ $message }}</span> @enderror
    </div>

    <div class="form-group" style="flex: 2;">
        <label for="name" class="form-label">Nama Skill / Tools <span class="required">*</span></label>
        <input type="text" name="name" id="name" class="form-input" value="{{ old('name', $skill->name) }}" required placeholder="contoh: Laravel, Flutter, Docker">
        @error('name') <span class="form-error">{{ $message }}</span> @enderror
    </div>

    <div class="form-group" style="flex: 1;">
        <label for="sort_order" class="form-label">Urutan</label>
        <input type="number" name="sort_order" id="sort_order" class="form-input" value="{{ old('sort_order', $skill->sort_order ?? 0) }}" min="0">
        @error('sort_order') <span class="form-error">{{ $message }}</span> @enderror
    </div>
</div>

<div class="form-group">
    <label for="note" class="form-label">Catatan Singkat / Keterangan</label>
    <input type="text" name="note" id="note" class="form-input" value="{{ old('note', $skill->note) }}" placeholder="contoh: Framework PHP untuk aplikasi web penuh">
    @error('note') <span class="form-error">{{ $message }}</span> @enderror
</div>

