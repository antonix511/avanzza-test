<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Folder extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'folders';

    protected $primaryKey = 'id';

    protected $fillable = [
        'name'
    ];

    public function files()
    {
        return $this->hasMany(File::class, 'folder_id', 'id');
    }
}
