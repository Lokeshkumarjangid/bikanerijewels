<?php

namespace App\Services;

use Illuminate\Support\Facades\Storage;

class FileUploadService
{
    public function uploadMultiple($files, $folder)
    {
        $paths = [];

        if (!empty($files)) {
            foreach ($files as $file) {
                $paths[] = $file->store($folder, 'public');
            }
        }

        return $paths;
    }

    public function uploadSingle($file, $folder)
    {
        if ($file) {
            return $file->store($folder, 'public');
        }

        return null;
    }
}