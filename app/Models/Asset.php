<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Asset extends Model
{
    use HasFactory;

    protected $fillable = [
        'asset_name',
        'asset_id',
        'purchase_date',
        'purchase_from',
        'manufacturer',
        'model',
        'serial_number',
        'supplier',
        'condition',
        'warranty',
        'value',
        'asset_user',
        'description',
        'status',
    ];

    // asset belongs to a user (যদি asset_user user id হয়)
    
}
