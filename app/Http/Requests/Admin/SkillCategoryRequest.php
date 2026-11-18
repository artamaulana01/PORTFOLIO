<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class SkillCategoryRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $id = $this->route('skill_category')?->id ?? $this->route('skill_category');

        return [
            'slug' => ['required', 'string', 'max:255', Rule::unique('skill_categories', 'slug')->ignore($id)],
            'name' => ['required', 'string', 'max:255'],
            'short_name' => ['required', 'string', 'max:255'],
            'layer' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'sort_order' => ['nullable', 'integer', 'min:0'],
        ];
    }

    public function messages(): array
    {
        return [
            'slug.required' => 'Slug kategori wajib diisi.',
            'slug.unique' => 'Slug kategori sudah digunakan.',
            'name.required' => 'Nama kategori wajib diisi.',
            'short_name.required' => 'Nama pendek kategori wajib diisi.',
            'layer.required' => 'Label layer kategori wajib diisi.',
            'description.required' => 'Deskripsi kategori wajib diisi.',
            'sort_order.integer' => 'Urutan harus berupa angka.',
        ];
    }
}

