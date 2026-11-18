<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProjectCategoryRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $id = $this->route('project_category')?->id ?? $this->route('project_category');

        return [
            'slug' => ['required', 'string', 'max:255', Rule::unique('project_categories', 'slug')->ignore($id)],
            'name' => ['required', 'string', 'max:255'],
        ];
    }

    public function messages(): array
    {
        return [
            'slug.required' => 'Slug kategori proyek wajib diisi.',
            'slug.unique' => 'Slug kategori sudah digunakan.',
            'name.required' => 'Nama kategori proyek wajib diisi.',
        ];
    }
}

