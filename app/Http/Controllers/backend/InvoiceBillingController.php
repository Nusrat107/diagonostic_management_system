<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class InvoiceBillingController extends Controller
{
    public function invoiceBilling(){
        return view('backend.invoice');
    }
}
