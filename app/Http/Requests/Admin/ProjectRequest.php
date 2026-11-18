<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProjectRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $id = $this->route('project')?->id ?? $this->route('project');

        return [
            'project_category_id' => ['required', 'exists:project_categories,id'],
            'slug' => ['required', 'string', 'max:255', Rule::unique('projects', 'slug')->ignore($id)],
            'title' => ['required', 'string', 'max:255'],
            'subtitle' => ['required', 'string', 'max:255'],
            'meta' => ['required', 'string', 'max:255'],
            'summary' => ['required', 'string'],
            'background' => ['required', 'string'],
            'color' => ['required', 'string', 'max:9'],
            'url' => ['nullable', 'string', 'max:255'],
            'github_url' => ['nullable', 'url', 'max:255'],
            'image' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp,svg', 'max:2048'],
            'sort_order' => ['nullable', 'integer', 'min:0'],
            'skills' => ['nullable', 'array'],
            'skills.*' => ['exists:skills,id'],
            'infos' => ['nullable', 'array'],
            'infos.*.label' => ['nullable', 'string', 'max:255'],
            'infos.*.value' => ['nullable', 'string', 'max:255'],
            'points' => ['nullable', 'array'],
            'points.*.body' => ['nullable', 'string'],
        ];
    }

    public function messages(): array
    {
        return [
            'project_category_id.required' => 'Kategori proyek wajib dipilih.',
            'project_category_id.exists' => 'Kategori proyek yang dipilih tidak valid.',
            'slug.required' => 'Slug proyek wajib diisi.',
            'slug.unique' => 'Slug proyek sudah digunakan.',
            'title.required' => 'Judul proyek wajib diisi.',
            'subtitle.required' => 'Subjudul proyek wajib diisi.',
            'meta.required' => 'Teks meta / stack ringkas wajib diisi.',
            'summary.required' => 'Ringkasan proyek wajib diisi.',
            'background.required' => 'Latar belakang & mandat proyek wajib diisi.',
            'color.required' => 'Kode warna tema proyek wajib diisi.',
            'github_url.url' => 'Format URL GitHub tidak valid.',
            'image.image' => 'Berkas harus berupa gambar.',
            'image.mimes' => 'Format gambar harus JPG, JPEG, PNG, WEBP, atau SVG.',
            'image.max' => 'Ukuran gambar maksimal 2 MB.',
            'sort_order.integer' => 'Urutan harus berupa angka.',
            'skills.array' => 'Data skill tidak valid.',
            'skills.*.exists' => 'Skill yang dipilih tidak ditemukan.',
        ];
    }
}

