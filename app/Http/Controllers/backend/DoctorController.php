<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Doctor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class DoctorController extends Controller
{
    public function doctor()
    {
        $doctorlist = Doctor::all();
        return view('backend.doctor.doctor',  compact('doctorlist'));
    }

    public function doctorAdd()
    {
        $doctorlist = Doctor::all();
        return view('backend.doctor.doctor-add', compact('doctorlist'));
    }

    public function create()
    {
        return view('backend.doctor.doctor-add');
    }


    public function doctorStore(Request $request)
    {
        $doctor = new Doctor();
        $doctor->first_name = $request->first_name;
        $doctor->last_name = $request->last_name;
        $doctor->username = $request->username;
        $doctor->email = $request->email;
        $doctor->password = Hash::make($request->password);
        $doctor->profession = $request->profession;
        $doctor->dob = $request->dob;
        $doctor->gender = $request->gender;
        $doctor->address = $request->address;
        $doctor->country = $request->country;
        $doctor->city = $request->city;
        $doctor->state = $request->state;
        $doctor->postal_code = $request->postal_code;
        $doctor->phone = $request->phone;
        $doctor->bio = $request->bio;
        $doctor->status = $request->status;

        if (isset($request->image)) {
            $imageName = rand() . '.' . 'doctor' . '.' . $request->image->extension();
            $request->image->move('backend/images/doctor/', $imageName);
            $doctor->image = $imageName;
        }

        $doctor->save();

        return redirect('/admin/doctor');
    }


    public function doctorView($id)
    {
        $doctor = Doctor::findOrFail($id);
        return view('backend.doctor.doctor-view', compact('doctor'));
    }
    public function doctorEdit($id)
    {
        $doctor = Doctor::findOrFail($id);
        return view('backend.doctor.doctor-edit', compact('doctor'));
    }



    public function doctorUpdate(Request $request, $id)
    {
        $doctor = Doctor::findOrFail($id);

        $doctor->first_name = $request->first_name;
        $doctor->last_name = $request->last_name;
        $doctor->username = $request->username;
        $doctor->email = $request->email;


        if ($request->password) {
            $doctor->password = Hash::make($request->password);
        }

        $doctor->profession = $request->profession;
        $doctor->dob = $request->dob;
        $doctor->gender = $request->gender;
        $doctor->address = $request->address;
        $doctor->country = $request->country;
        $doctor->city = $request->city;
        $doctor->state = $request->state;
        $doctor->postal_code = $request->postal_code;
        $doctor->education = $request->education;
        $doctor->experence = $request->experence;
        $doctor->phone = $request->phone;
        $doctor->bio = $request->bio;
        $doctor->status = $request->status;


        if ($request->hasFile('image')) {
            $image = $request->file('image');


            if ($doctor->image && file_exists(public_path('backend/images/doctors/' . $doctor->image))) {
                unlink(public_path('backend/images/doctors/' . $doctor->image));
            }


            $imageName = rand() . '-doctor' . '.' . $image->extension();
            $image->move(public_path('backend/images/doctors/'), $imageName);
            $doctor->image = $imageName;
        }

        $doctor->save();

        return redirect('/admin/doctor');
    }

    public function doctorDelete($id)
    {
        $doctor = Doctor::find($id);

        if ($doctor->image && file_exists('backend/images/doctor/' . $doctor->image)) {
            unlink('backend/images/doctor/' . $doctor->image);
        }

        $doctor->delete();
        return redirect()->back();
    }
    public function profileEdit($id)
    {
     
        $doctor = Doctor::findOrFail($id);

   
        return view('backend.doctor.profile-edit', compact('doctor'));
    }


    public function profileUpdate(Request $request, $id)
    {
        $doctor = Doctor::findOrFail($id);


        $doctor->first_name = $request->first_name;
        $doctor->last_name  = $request->last_name;
        $doctor->birth_date = $request->birth_date;
        $doctor->gender     = $request->gender;

        $doctor->address  = $request->address;
        $doctor->state    = $request->state;
        $doctor->country  = $request->country;
        $doctor->pin_code = $request->pin_code;
        $doctor->phone    = $request->phone;

        if ($request->hasFile('image')) {
            $image = $request->file('image');


            if ($doctor->image && file_exists(public_path('backend/images/doctors/' . $doctor->image))) {
                unlink(public_path('backend/images/doctors/' . $doctor->image));
            }


            $imageName = rand() . '-doctor' . '.' . $image->extension();
            $image->move(public_path('backend/images/doctors/'), $imageName);
            $doctor->image = $imageName;
        }
        $doctor->save();

       
        if ($request->filled('institution') || $request->filled('degree') || $request->filled('subject')) {
            $doctor->educations()->create([
                'institution'   => $request->institution,
                'subject'       => $request->subject,
                'start_date'    => $request->start_date,
                'complete_date' => $request->complete_date,
                'degree'        => $request->degree,
                'grade'         => $request->grade,
            ]);
        }


   
        if ($request->filled('company') || $request->filled('job_position')) {
            $doctor->experiences()->create([
                'company'     => $request->company,
                'location'    => $request->location,
                'job_position' => $request->job_position,
                'period_from' => $request->period_from,
                'period_to'   => $request->period_to,
            ]);
        }
        
        return redirect()->back();
    }
}
