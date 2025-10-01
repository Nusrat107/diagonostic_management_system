<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Invoice;

class InvoiceController extends Controller
{

    public function invoice()
    {
        $invoices = Invoice::all()->map(function($invoice){

            $invoice->total_amount = (float)$invoice->total_amount;
            $invoice->due_amount   = (float)$invoice->due_amount;
            return $invoice;
        });

        return view('backend.invoice.invoice', compact('invoices'));
    }


    public function invoiceAdd()
    {
        return view('backend.invoice.invoice-add'); 
    }


    public function invoiceStore(Request $request)
    {
        $services = is_array($request->services) ? implode(',', $request->services) : $request->services;
        $amounts  = is_array($request->amounts) ? implode(',', $request->amounts) : $request->amounts;

        Invoice::create([
            'patient_name'   => $request->patient_name,
            'patient_id'     => $request->patient_id,
            'admission_date' => $request->admission_date,
            'discharge_date' => $request->discharge_date,
            'services'       => $services,
            'amounts'        => $amounts,
            'total_amount'   => $request->total_amount ? (string)$request->total_amount : '0',
            'due_amount'     => $request->due_amount ? (string)$request->due_amount : $request->total_amount ?? '0',
        ]);

        return redirect('/admin/invoice');
    }


    public function invoiceView($id)
    {
        $invoice = Invoice::findOrFail($id);
        return view('backend.invoice.invoice-view', compact('invoice'));
    }

 
    public function invoiceEdit($id)
    {
        $invoice = Invoice::findOrFail($id);
        return view('backend.invoice.invoice-edit', compact('invoice'));
    }


    public function invoiceUpdate(Request $request, $id)
    {
        $invoice = Invoice::findOrFail($id);

        $services = is_array($request->services) ? implode(',', $request->services) : $request->services;
        $amounts  = is_array($request->amounts) ? implode(',', $request->amounts) : $request->amounts;

        $invoice->update([
            'patient_name'   => $request->patient_name,
            'patient_id'     => $request->patient_id,
            'admission_date' => $request->admission_date,
            'discharge_date' => $request->discharge_date,
            'services'       => $services,
            'amounts'        => $amounts,
            'total_amount'   => $request->total_amount ? (string)$request->total_amount : '0',
            'due_amount'     => $request->due_amount ? (string)$request->due_amount : $request->total_amount ?? '0',
        ]);

        return redirect('/admin/invoice');
    }

    // Delete invoice
    public function invoiceDelete($id)
    {
        $invoice = Invoice::findOrFail($id);
        $invoice->delete();

        return redirect('/admin/invoice');
    }
}
