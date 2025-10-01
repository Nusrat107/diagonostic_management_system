<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Patient;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    public function patient()
    {
        $patients = Patient::all();
        return view('backend.patients.patient', compact('patients'));
    }

    public function patientAdd()
    {
        return view('backend.patients.patient-add');
    }

     public function patientStore(Request $request)
    {
        $patient = new Patient();
        $patient->first_name = $request->first_name;
        $patient->last_name = $request->last_name;
        $patient->username = $request->username;
        $patient->email = $request->email;
        if ($request->password) {
            $patient->password = bcrypt($request->password);
        }
        $patient->dob = $request->dob;
        $patient->gender = $request->gender;
        $patient->address = $request->address;
        $patient->country = $request->country;
        $patient->city = $request->city;
        $patient->state = $request->state;
        $patient->postal_code = $request->postal_code;
        $patient->phone = $request->phone;
        $patient->status = $request->status;

        if (isset($request->image)) {
            $imageName = rand() . '.' . 'patient' . '.' . $request->image->extension();
            $request->image->move('backend/images/patient/', $imageName);
            $patient->image = $imageName;
        }

        $patient->save();

        return redirect('/admin/patient');
    }

     public function patientView($id)
    {
        $patient = Patient::find($id);
        return view('backend.patients.patient-view', compact('patient'));
    }

     public function patientEdit($id)
    {
        $patient = Patient::find($id);
        return view('backend.patients.patient-edit', compact('patient'));
    }

     public function patientUpdate(Request $request, $id)
    {
        $patient = Patient::find($id);

        $patient->first_name = $request->first_name;
        $patient->last_name = $request->last_name;
        $patient->username = $request->username;
        $patient->email = $request->email;
        if ($request->password) {
            $patient->password = bcrypt($request->password);
        }
        $patient->dob = $request->dob;
        $patient->gender = $request->gender;
        $patient->address = $request->address;
        $patient->country = $request->country;
        $patient->city = $request->city;
        $patient->state = $request->state;
        $patient->postal_code = $request->postal_code;
        $patient->phone = $request->phone;
        $patient->status = $request->status;

        if (isset($request->image)) {
    
            if ($patient->image && file_exists('backend/images/patient/' . $patient->image)) {
                unlink('backend/images/patient/' . $patient->image);
            }
            $imageName = rand() . '.' . 'patient' . '.' . $request->image->extension();
            $request->image->move('backend/images/patient/', $imageName);
            $patient->image = $imageName;
        }

        $patient->save();

        return redirect('/admin/patient');
    }

    public function patientDelete($id)
    {
        $patient = Patient::find($id);

        if ($patient->image && file_exists('backend/images/patient/' . $patient->image)) {
            unlink('backend/images/patient/' . $patient->image);
        }

        $patient->delete();
        return redirect()->back();
}
}