<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Doctor;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\File;

class DoctorController extends Controller
{
    public function doctor()
    {
        $doctorlist = Doctor::get();
        return view('backend.doctor', compact('doctorlist'));
    }

    public function doctorAdd()
    {
        return view('backend.doctor-add');
    }


    public function doctorStore(Request $request)
    {

        $doctor = new Doctor();

        $doctor->first_name = $request->first_name;
        $doctor->last_name = $request->last_name;
        $doctor->username = $request->username;
        $doctor->email = $request->email;
        $doctor->doc_prof = $request->doc_prof;
        $doctor->password = $request->password;
        $doctor->password_confirmation = $request->password_confirmation;


        $doctor->date_of_birth = Carbon::now()->format('d/m/Y');

        $doctor->gender = $request->gender;
        $doctor->address = $request->address;
        $doctor->district = $request->district;
        $doctor->city = $request->city;
        $doctor->state = $request->state;
        $doctor->postal_code = $request->postal_code;
        $doctor->phone = $request->phone;
        if ($request->hasFile('image')) {
    $imageName = rand() . '-doctor.' . $request->image->extension();
    $request->image->move(public_path('uploads/doctors/'), $imageName);
    $doctor->image = $imageName;
}

        $doctor->biography = $request->biography;
        $doctor->status = $request->status;


        $doctor->save();

 toastr()->success(' Doctor account created successfully!');
        return redirect('/admin/doctor');
    }

    public function doctorView($id)
    {
        $doctor = Doctor::find($id);

        if (!$doctor) {
            return redirect('/admin/doctor')->with('error', 'Doctor not found.');
        }

        return view('backend.doctor-view', compact('doctor'));
    }

    public function doctorEdit($id)
{
    $doctor = Doctor::findOrFail($id);
    return view('backend.doctor-edit', compact('doctor'));
}

public function doctorUpdate(Request $request, $id)
    {
        $doctor = Doctor::findOrFail($id);

        // Basic info
        $doctor->first_name = $request->first_name;
        $doctor->last_name = $request->last_name;
        $doctor->date_of_birth = $request->date_of_birth;
        $doctor->gender = $request->gender;
        $doctor->address = $request->address;
        $doctor->phone = $request->phone;
        $doctor->email = $request->email;

        // Image upload
        if($request->hasFile('image')) {
            // Delete old image if exists
            if($doctor->image && File::exists(public_path('uploads/doctors/'.$doctor->image))) {
                File::delete(public_path('uploads/doctors/'.$doctor->image));
            }

            $file = $request->file('image');
            $filename = time().'_'.$file->getClientOriginalName();
            $file->move(public_path('uploads/doctors/'), $filename);
            $doctor->image = $filename;
        }

        // Education & Experience
        $doctor->education = $request->education ? json_encode($request->education) : json_encode([]);
        $doctor->experience = $request->experience ? json_encode($request->experience) : json_encode([]);

        $doctor->save();

        toastr()->success(' Doctor account created successfully!');
        return redirect('/admin/doctor');
    }

    public function doctorDelete($id)
{
    $doctor = Doctor::findOrFail($id);
    $doctor->delete();

     toastr()->success('doctor delete successfully!');
    return redirect('/admin/doctor');
}
}


