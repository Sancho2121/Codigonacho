<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'project_name',
        'client_id',
        'user_request',
        'project_type',
        'contact_name',
        'contact_phone',
        'request_date',
        'execution_date',
        'end_execution_date',
        'logistics',
        'status'
    ];

    public function request_user()
    {
        return $this->belongsTo(User::class,'user_request');
    }
}
