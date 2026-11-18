<div class="form-group">
    <label for="name" class="form-label">Nama Tipe Milestone <span class="required">*</span></label>
    <input type="text" name="name" id="name" class="form-input" value="{{ old('name', $type->name) }}" required placeholder="contoh: Pendidikan, Organisasi, Pencapaian, Program">
    @error('name') <span class="form-error">{{ $message }}</span> @enderror
</div>

