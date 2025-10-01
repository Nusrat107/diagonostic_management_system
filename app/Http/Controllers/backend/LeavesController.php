<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Leave;
use Carbon\Carbon;
use Illuminate\Http\Request;

class LeavesController extends Controller
{

    public function leave()
    {
        $leaves = Leave::all();
        return view('backend.leaves.leave', compact('leaves'));
    }


    public function leaveAdd()
    {
        return view('backend.leaves.leave-add');
    }


    public function leaveStore(Request $request)
    {
        $from = Carbon::parse($request->from_date);
        $to   = Carbon::parse($request->to_date);
        $days = $from->diffInDays($to) + 1;

        $totalLeaves = 12; 
        $usedLeaves = Leave::where('leave_type', $request->leave_type)->sum('days');
        $remaining = $totalLeaves - ($usedLeaves + $days);

        $leave = new Leave();
        $leave->leave_type       = $request->leave_type;
        $leave->from_date        = $from;
        $leave->to_date          = $to;
        $leave->days             = $days;
        $leave->remaining_leaves = $remaining < 0 ? 0 : $remaining;
        $leave->reason           = $request->reason;
        $leave->save();

        return redirect('/admin/leave');
    }


    public function leaveView($id)
    {
        $leave = Leave::findOrFail($id);
        return view('backend.leaves.leave-view', compact('leave'));
    }


    public function leaveEdit($id)
    {
        $leave = Leave::findOrFail($id);
        return view('backend.leaves.leave-edit', compact('leave'));
    }


    public function leaveUpdate(Request $request, $id)
    {
        $from = Carbon::parse($request->from_date);
        $to   = Carbon::parse($request->to_date);
        $days = $from->diffInDays($to) + 1;

        $totalLeaves = 12;
        $usedLeaves = Leave::where('leave_type', $request->leave_type)
            ->where('id', '!=', $id)
            ->sum('days');
        $remaining = $totalLeaves - ($usedLeaves + $days);

        $leave = Leave::findOrFail($id);
        $leave->leave_type       = $request->leave_type;
        $leave->from_date        = $from;
        $leave->to_date          = $to;
        $leave->days             = $days;
        $leave->remaining_leaves = $remaining < 0 ? 0 : $remaining;
        $leave->reason           = $request->reason;
        $leave->save();

        return redirect('/admin/leave');
    }


    public function leaveDelete($id)
    {
        $leave = Leave::findOrFail($id);
        $leave->delete();
        return redirect('/admin/leave');
    }
}



