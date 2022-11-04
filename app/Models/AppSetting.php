<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class AppSetting extends Model
{
    use HasFactory;

    protected $fillable = [
        'app_name',
        'app_shortname',
        'app_weburl',
        'app_color',
        'app_logo',
        'app_favicon',
        'app_wallpaper',
    ];
}
