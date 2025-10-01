<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Holiday;
use Illuminate\Http\Request;

class HolidayController extends Controller
{

    public function holiday()
    {
        $holidays = Holiday::all(); 
        return view('backend.holiday.holiday', compact('holidays'));
    }


    public function holidayAdd()
    {
        return view('backend.holiday.holiday-add');
    }

   
    public function holidayStore(Request $request)
    {
        $holiday = new Holiday();
        $holiday->holiday_name = $request->holiday_name;
        $holiday->holiday_date = $request->holiday_date;
        $holiday->save();

        return redirect('/admin/holiday');
    }


    public function holidayView($id)
    {
        $holiday = Holiday::findOrFail($id);
        return view('backend.holiday.holiday-view', compact('holiday'));
    }


    public function holidayEdit($id)
    {
        $holiday = Holiday::findOrFail($id);
        return view('backend.holiday.holiday-edit', compact('holiday'));
    }

    public function holidayUpdate(Request $request, $id)
    {
        $holiday = Holiday::findOrFail($id);
        $holiday->holiday_name = $request->holiday_name;
        $holiday->holiday_date = $request->holiday_date;
        $holiday->save();

        return redirect('/admin/holiday');
    }

    public function holidayDelete($id)
    {
        $holiday = Holiday::findOrFail($id);
        $holiday->delete();

        return redirect('/admin/holiday');
    }
}
