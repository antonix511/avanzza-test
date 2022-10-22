<?php

namespace App\Http\Repositories;

use App\Exceptions\EmptyResponseException;
use App\Models\File;
use Illuminate\Support\Facades\Storage;

class FilesRepository
{
    public function show($onlyDeleted = false)
    {
        return ($onlyDeleted) ? File::onlyTrashed()->get() : File::all();
    }

    public function get($id, $onlyDeleted = false)
    {
        $file = ($onlyDeleted) ? File::onlyTrashed()->find($id) : File::find($id);

        if (is_null($file)) throw new EmptyResponseException('Archivo no encontrado');

        return $file;
    }

    public function save(File $file)
    {
        $file->save();
    }

    public function delete(File $file)
    {
        $file->delete();
    }

    public function restore(File $file)
    {
        $file->restore();
    }

    public function hardDelete(File $file)
    {
        Storage::delete($file->filepath);
        $file->forceDelete();
    }
}
