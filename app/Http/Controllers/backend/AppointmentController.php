<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    public function appointment()
    {
        $appointments = Appointment::latest()->get();
        return view('backend.appointment.appointment', compact('appointments'));
    }

    public function appointmentAdd()
    {
        $currentDate = Carbon::now()->format('Y-m-d');
        return view('backend.appointment.appointment-add', compact('currentDate'));
    }

    public function appointmentStore(Request $request)
    {
   
        $lastAppointment = Appointment::latest()->first();
        if ($lastAppointment) {
            $lastId = (int) str_replace('APT-', '', $lastAppointment->appointment_id);
            $newId = 'APT-' . str_pad($lastId + 1, 4, '0', STR_PAD_LEFT);
        } else {
            $newId = 'APT-0001';
        }

        $appointment = new Appointment();
        $appointment->appointment_id = $newId; 
        $appointment->patient_name = $request->patient_name;
        $appointment->department = $request->department;
        $appointment->doctor = $request->doctor;
        $appointment->date = $request->date ?? Carbon::now()->format('Y-m-d');
        $appointment->time = $request->time;
        $appointment->patient_email = $request->patient_email;
        $appointment->patient_phone = $request->patient_phone;
        $appointment->message = $request->message;
        $appointment->status = $request->status ?? 'active';
        $appointment->save();

        return redirect('/admin/appointment');
    }

    public function appointmentView($id)
    {
        $appointment = Appointment::findOrFail($id);
        return view('backend.appointment.appointment-view', compact('appointment'));
    }

    public function appointmentEdit($id)
    {
        $appointment = Appointment::findOrFail($id);
        return view('backend.appointment.appointment-edit', compact('appointment'));
    }

    public function appointmentUpdate(Request $request, $id)
    {
        $appointment = Appointment::findOrFail($id);
        $appointment->patient_name = $request->patient_name;
        $appointment->department = $request->department;
        $appointment->doctor = $request->doctor;
        $appointment->date = $request->date ?? Carbon::now()->format('Y-m-d');
        $appointment->time = $request->time;
        $appointment->patient_email = $request->patient_email;
        $appointment->patient_phone = $request->patient_phone;
        $appointment->message = $request->message;
        $appointment->status = $request->status ?? 'active';
        $appointment->save();

        return redirect('/admin/appointment');
    }

    public function appointmentDelete($id)
    {
        $appointment = Appointment::findOrFail($id);
        $appointment->delete();

        return redirect('/admin/appointment');
    }
}
