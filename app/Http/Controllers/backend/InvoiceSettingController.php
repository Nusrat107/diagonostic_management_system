<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\InvoiceSetting;
use Illuminate\Http\Request;

class InvoiceSettingController extends Controller
{
    public function invoiceSetting()
    {
        $invoice = InvoiceSetting::first() ?? new InvoiceSetting();
        return view('backend.invoice-setting.invoice-setting', compact('invoice'));
    }


    public function invoiceSettingStore(Request $request)
    {
        $invoice = InvoiceSetting::first() ?? new InvoiceSetting();

   
        $invoice->invoice_prefix = $request->invoice_prefix;

        if ($request->hasFile('invoice_logo')) {
            $file = $request->file('invoice_logo');
            $imageName = rand().'.'.$file->extension();
            $file->move(public_path('backend/images/invoice/'), $imageName);
            $invoice->invoice_logo = 'backend/images/invoice/'.$imageName;
        }

        $invoice->save();

        return redirect()->back();
    }
}
