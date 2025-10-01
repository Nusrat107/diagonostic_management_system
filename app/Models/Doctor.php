<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    use HasFactory;

    public function educations()
    {
        return $this->hasMany(Doctor_Education::class, 'doctor_id', 'id');
    }

    public function experiences()
    {
        return $this->hasMany(Doctor_Experiences::class, 'doctor_id', 'id');
    }
}
