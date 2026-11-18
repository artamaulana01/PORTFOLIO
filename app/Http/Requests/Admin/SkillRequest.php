<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class SkillRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $id = $this->route('skill')?->id ?? $this->route('skill');

        return [
            'skill_category_id' => ['required', 'exists:skill_categories,id'],
            'name' => ['required', 'string', 'max:255', Rule::unique('skills', 'name')->ignore($id)],
            'note' => ['nullable', 'string', 'max:255'],
            'sort_order' => ['nullable', 'integer', 'min:0'],
        ];
    }

    public function messages(): array
    {
        return [
            'skill_category_id.required' => 'Kategori skill wajib dipilih.',
            'skill_category_id.exists' => 'Kategori skill yang dipilih tidak valid.',
            'name.required' => 'Nama skill wajib diisi.',
            'name.unique' => 'Nama skill sudah terdaftar.',
            'sort_order.integer' => 'Urutan harus berupa angka.',
        ];
    }
}

