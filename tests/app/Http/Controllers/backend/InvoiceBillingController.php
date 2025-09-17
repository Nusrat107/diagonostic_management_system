<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Invoice;
use Illuminate\Http\Request;

class InvoiceBillingController extends Controller
{
    public function invoiceBilling()
    {
        $invoicelist = Invoice::get();
   
        return view('backend.invoice', compact('invoicelist'));
    }
    public function invoiceCreate()
    {
        return view('backend.invoice-create');
    }

    public function invoiceStore(Request $request)
    {
        $invoice = new Invoice();


        $invoice->barcode = 'INV-' . strtoupper(uniqid());


        $latestInvoice = Invoice::latest()->first();
        $nextId = $latestInvoice ? $latestInvoice->id + 1 : 1;
        $invoice->patient_code = 'P' . str_pad($nextId, 3, '0', STR_PAD_LEFT);


        $invoice->patient_name = $request->patient_name;
        $invoice->phone_number = $request->phone_number;
        $invoice->address = $request->address;


        $invoice->subtotal = $request->subtotal;
        $invoice->discount = $request->discount;
        $invoice->total = $request->total;
        $invoice->paid_amount = $request->paid_amount;
        $invoice->due_amount = $request->due_amount;

        $invoice->date = now();


        $invoice->status = $request->status ?? 'Pending';

        $invoice->save();
 toastr()->success('Invoice create successfully!');
        return redirect('/admin/invoice');
    }

    public function invoiceView($id)
{
    $invoice = Invoice::findOrFail($id); 

    return view('backend.invoice-view', compact('invoice'));
}
public function invoiceEdit($id)
{
    $invoice = Invoice::findOrFail($id);
    return view('backend.invoice-edit', compact('invoice'));
}

public function invoiceUpdate(Request $request, $id)
{
    $invoice = Invoice::findOrFail($id);
    $invoice->barcode = $request->barcode;
    $invoice->patient_code = $request->patient_code;
    $invoice->patient_name = $request->patient_name;
    $invoice->phone_number = $request->phone_number;
    $invoice->address = $request->address;
    $invoice->subtotal = $request->subtotal;
    $invoice->discount = $request->discount;
    $invoice->total = $request->total;
    $invoice->paid_amount = $request->paid_amount;
    $invoice->due_amount = $request->due_amount;
    $invoice->date = $request->date;
    $invoice->status = $request->status;
    $invoice->save();

     toastr()->success('Invoice update successfully!');
    return redirect('/admin/invoice');
}

public function invoiceDelete($id)
{
    $invoice = Invoice::findOrFail($id);
    $invoice->delete();

     toastr()->success('Invoice delete successfully!');
    return redirect('/admin/invoice');
}

public function invoicePrint($id)
{
    $invoice = Invoice::findOrFail($id);
    return view('backend.invoice-print', compact('invoice'));
}

}

