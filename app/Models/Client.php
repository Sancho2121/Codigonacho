<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    protected $fillable = [
        'client_name',
        'client_razonsocial',
        'client_rfc',
        'client_address',
        'client_city',
        'client_postal',
        'client_country',
        'client_email',
        'client_phone_1',
        'client_phone_2',
        'client_logo',
        'client_active',
    ];
}
