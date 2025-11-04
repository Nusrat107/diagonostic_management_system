<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function educations()
    {
        return $this->hasMany(Doctor_Education::class, 'doctor_id', 'id');
    }

    public function experiences()
    {
        return $this->hasMany(Doctor_Experiences::class, 'doctor_id', 'id');
    }
    
    public function doctorShedule()
    {
        return $this->hasMany(DoctorShedule::class, 'doctor_id', 'id');
    }

    public function appointments()
{
    return $this->hasMany(Appointment::class, 'doctor_id', 'id');
}

}
