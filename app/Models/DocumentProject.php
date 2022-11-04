<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DocumentProject extends Model
{
    use HasFactory;

    protected $fillable = [
        'project_id',
        'file_name',
        'file_ext',
        'file_name_ext',
        'file_path',
        'file_path_name_ext',
        'file_size',
        'user_id',
        'module',
        'fecha_vigencia',
    ];
}
