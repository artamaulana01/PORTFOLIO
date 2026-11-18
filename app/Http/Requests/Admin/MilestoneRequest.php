<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class MilestoneRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'milestone_type_id' => ['required', 'exists:milestone_types,id'],
            'title' => ['required', 'string', 'max:255'],
            'place' => ['required', 'string', 'max:255'],
            'period' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'sort_order' => ['nullable', 'integer', 'min:0'],
            'points' => ['nullable', 'array'],
            'points.*.body' => ['nullable', 'string'],
            'tags' => ['nullable', 'array'],
            'tags.*' => ['nullable', 'string', 'max:100'],
        ];
    }

    public function messages(): array
    {
        return [
            'milestone_type_id.required' => 'Tipe milestone wajib dipilih.',
            'milestone_type_id.exists' => 'Tipe milestone yang dipilih tidak valid.',
            'title.required' => 'Judul milestone wajib diisi.',
            'place.required' => 'Tempat / instansi wajib diisi.',
            'period.required' => 'Periode waktu wajib diisi.',
            'description.required' => 'Deskripsi milestone wajib diisi.',
            'sort_order.integer' => 'Urutan harus berupa angka.',
        ];
    }
}

