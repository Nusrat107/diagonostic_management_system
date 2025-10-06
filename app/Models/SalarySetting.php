<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SalarySetting extends Model
{
    use HasFactory;

    protected $fillable = [
        'da',
        'hra',
        'pf_employee',
        'pf_organization',
        'esi_employee',
        'esi_organization',
    ];
}
