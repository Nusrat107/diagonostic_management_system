<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CallController extends Controller
{
    public function voiceCall()
    {
        return view('backend.call.voice-call');
    }

    public function vedioCall()
    {
        return view('backend.call.vedio-call');
    }

    public function incomingCall()
    {
        return view('backend.call.incoming-call');
    }
}
