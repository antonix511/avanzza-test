<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class File extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'files';

    protected $primaryKey = 'id';

    protected $fillable = [
        'filename',
        'filepath'
    ];

    public static function makeFile($array)
    {
        $file = new self();
        $file->filename = $array['name'];
        $file->filepath = $array['path'];
        return $file;
    }

    static $rules = [
        'filenames' => 'required',
        'filenames.*' => 'mimes:doc,pdf,docx,zip,jpg,png,jpeg,gif,svg,xlsx|max:500'
    ];

    static $messages = [
        'filenames' => 'El :attribute es obligatorio',
        'filenames.mimes' => 'Los :attribute no son del tipo permitido.',
        'filenames.max' => 'Tamaño maximo permitido'
    ];
}
