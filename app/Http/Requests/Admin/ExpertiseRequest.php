<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class ExpertiseRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'slug' => ['required', 'string', 'max:255'],
            'label' => ['required', 'string', 'max:255'],
            'title' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'sort_order' => ['nullable', 'integer', 'min:0'],
            'skills' => ['nullable', 'array'],
            'skills.*' => ['exists:skills,id'],
        ];
    }

    public function messages(): array
    {
        return [
            'slug.required' => 'Slug bidang keahlian wajib diisi.',
            'label.required' => 'Label tab keahlian wajib diisi.',
            'title.required' => 'Judul bidang keahlian wajib diisi.',
            'description.required' => 'Deskripsi bidang keahlian wajib diisi.',
            'sort_order.integer' => 'Urutan harus berupa angka.',
            'skills.array' => 'Data skill yang dipilih tidak valid.',
            'skills.*.exists' => 'Skill yang dipilih tidak ditemukan di database.',
        ];
    }
}

