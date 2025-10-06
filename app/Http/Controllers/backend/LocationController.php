<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Location;
use Illuminate\Http\Request;

class LocationController extends Controller
{
  public function location()
    {
        
        $location = Location::first() ?? new Location();

        return view('backend.location.location', compact('location'));
    }


    public function locationStore(Request $request)
    {

        $location = Location::first() ?? new Location();

 
        $location->country = $request->country ?? 'Bangladesh';
        $location->address = $request->address ?? '';
        $location->city = $request->city ?? '';
        $location->phone = $request->phone ?? '';
        $location->email = $request->email ?? '';
        $location->website = $request->website ?? '';
        $location->date_format = $request->date_format ?? date('d-m-Y');
        $location->timezone = $request->timezone ?? 'Asia/Dhaka';


        $location->save();

        return redirect()->back()->with('success', 'Localization settings updated successfully!');
    }
}
