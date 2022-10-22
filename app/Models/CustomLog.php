<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomLog extends Model
{
    use HasFactory;

    protected $table = 'customlog';

    protected $primaryKey = 'id';

    protected $fillable = [
        'ip',
        'endpoint',
        'method'
    ];
}
