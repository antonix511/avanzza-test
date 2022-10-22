<?php

namespace App\Http\Utils;

use Illuminate\Support\Facades\Storage;

trait FileUploadHelper
{
    public function getFilesData($data)
    {
        $response = [];

        foreach ($data as $file) {
            $name = time() . '-' . $file->getClientOriginalName();
            $path = Storage::putFileAs(env('UPLOAD_PATH'), $file, str_replace(' ', '-', $name));
            $response[] = [
                'name' => $name,
                'path' => $path
            ];
        }

        return $response;
    }
}
