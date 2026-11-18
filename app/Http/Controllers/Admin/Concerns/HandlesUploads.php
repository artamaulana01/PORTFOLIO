<?php

namespace App\Http\Controllers\Admin\Concerns;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Str;

trait HandlesUploads
{
    /**
     * Upload berkas langsung ke direktori public/uploads/... dan kembalikan relative path.
     * Path relatif ini disimpan di database agar fungsi asset($path) di view publik langsung berfungsi.
     */
    protected function uploadFile(UploadedFile $file, string $folder, ?string $oldPath = null): string
    {
        if ($oldPath) {
            $this->deleteFile($oldPath);
        }

        $extension = $file->getClientOriginalExtension();
        $filename = Str::random(32).'.'.$extension;
        $destination = public_path('uploads/'.trim($folder, '/'));

        if (! file_exists($destination)) {
            mkdir($destination, 0755, true);
        }

        $file->move($destination, $filename);

        return 'uploads/'.trim($folder, '/').'/'.$filename;
    }

    /**
     * Hapus berkas lama dari public_path jika berada di dalam direktori uploads/.
     * Berkas bawaan di luar uploads/ tidak akan terhapus secara tidak sengaja.
     */
    protected function deleteFile(?string $relativePath): void
    {
        if (! $relativePath) {
            return;
        }

        if (str_starts_with($relativePath, 'uploads/')) {
            $fullPath = public_path($relativePath);
            if (file_exists($fullPath) && is_file($fullPath)) {
                @unlink($fullPath);
            }
        }
    }
}

