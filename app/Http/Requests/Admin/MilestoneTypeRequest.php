<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class MilestoneTypeRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $id = $this->route('milestone_type')?->id ?? $this->route('milestone_type');

        return [
            'name' => ['required', 'string', 'max:255', Rule::unique('milestone_types', 'name')->ignore($id)],
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Nama tipe milestone wajib diisi.',
            'name.unique' => 'Nama tipe milestone sudah ada.',
        ];
    }
}

