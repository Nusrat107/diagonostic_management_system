<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DoctorShedule;

class DoctorSheduleController extends Controller
{

    public function doctorshedule()
    {
        $schedules = DoctorShedule::all(); 
        return view('backend.doctor-shedule.doctor-shedule', compact('schedules'));
    }

  
    public function doctorSheduleAdd()
    {
        return view('backend.doctor-shedule.shedule-add'); 
    }

 
    public function doctorSheduleStore(Request $request)
    {
        $schedule = new DoctorShedule();
        $schedule->doctor_name = $request->doctor_name;
        $schedule->day = $request->day;
        $schedule->start_time = $request->start_time;
        $schedule->end_time = $request->end_time;
        $schedule->message = $request->message;
        $schedule->status = $request->status;
        $schedule->save();

        return redirect('/admin/doctorshedule');
    }


    public function doctorSheduleView($id)
    {
        $schedule = DoctorShedule::findOrFail($id); 
        return view('backend.doctor-shedule.shedule-view', compact('schedule'));
    }

   
    public function doctorSheduleEdit($id)
    {
        $schedule = DoctorShedule::findOrFail($id);
        return view('backend.doctor-shedule.shedule-edit', compact('schedule'));
    }

    public function doctorSheduleUpdate(Request $request, $id)
    {
        $schedule = DoctorShedule::findOrFail($id);
        $schedule->doctor_name = $request->doctor_name;
        $schedule->day = $request->day;
        $schedule->start_time = $request->start_time;
        $schedule->end_time = $request->end_time;
        $schedule->message = $request->message;
        $schedule->status = $request->status;
        $schedule->save();

        return redirect('/admin/doctorshedule');
    }

 
    public function doctorSheduleDelete($id)
    {
        $schedule = DoctorShedule::findOrFail($id);
        $schedule->delete();

        return redirect('/admin/doctorshedule');
    }
}
