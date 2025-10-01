<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;

     protected $fillable = [
        'patient_name',
        'patient_id',
        'admission_date',
        'discharge_date',
        'services',
        'amounts',
        'total_amount',
    ];
}
