<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EmailController extends Controller
{
    public function composeEmail()
    {
        return view('backend.email.compose-email');
    }
    public function inboxEmail()
    {
        return view('backend.email.inbox-email');
    }
    public function viewEmail()
    {
        return view('backend.email.view-email');
    }
}
