<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    use HasFactory;

    protected $fillable = [
        'supplier_date',
        'supplier_type',
        'supplier_number',
        'supplier_status',
        'supplier_name',
        'supplier_razonsocial',
        'supplier_rfc',
        'supplier_curp',
        'supplier_address',
        'supplier_city',
        'supplier_town',
        'supplier_postal',
        'supplier_state',
        'supplier_country',
        'supplier_email',
        'supplier_phone',
        'supplier_contact',
        'supplier_logo',
        'credit_days',
        'coin_id',
        'bank_id',
        'bank_place',
        'bank_branch',
        'bank_account',
        'bank_clabe',
        'bank_optional_id',
        'bank_optional_place',
        'bank_optional_branch',
        'bank_optional_account',
        'bank_optional_clabe',
        'reference1_razonsocial',
        'reference1_contact',
        'reference1_phone',
        'reference2_razonsocial',
        'reference2_contact',
        'reference2_phone',
        'seller_name',
        'seller_email',
        'seller_phone',
        'supplier_observations',
        'supplier_sign',
];


}
