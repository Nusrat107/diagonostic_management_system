<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use App\Models\Doctor;
use App\Models\Patient;
use Illuminate\Http\Request;

class AdminController extends Controller
{
      public function __construct()
    {
        $this->middleware('auth');
    }
    
   public function adminDashboard() {
    $doctorsCount = Doctor::count();
    $patientsCount = Patient::count();
    $attendCount = Appointment::where('status','attend')->count();
    $pendingCount = Appointment::where('status','pending')->count();
    $recentAppointments = Appointment::latest()->take(5)->get();
    $newPatients = Patient::latest()->take(5)->get();
    $doctors = Doctor::all();

    // Hospital Management Stats
      $hospitalStats = [
        ['percent' => 16, 'title' => 'OPD Patient'],
        ['percent' => 71, 'title' => 'New Patient'],
        ['percent' => 82, 'title' => 'Laboratory Test'],
        ['percent' => 67, 'title' => 'Treatment'],
        ['percent' => 30, 'title' => 'Discharge'],
    ];


    return view('backend.dashboard', compact(
        'doctorsCount',
        'patientsCount',
        'attendCount',
        'pendingCount',
        'recentAppointments',
        'newPatients',
        'doctors',
        'hospitalStats' 
    ));

}
}
