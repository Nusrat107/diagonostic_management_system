<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Payment;
use Illuminate\Http\Request;

class PaymentsController extends Controller   
{
    public function payment()
    {
        $payments = Payment::get();
        return view('backend.payment.payment', compact('payments'));
    }

    public function paymentAdd()
    {
        return view('backend.payment.payment-add');
    }

    public function paymentStore(Request $request)
    {
        $payment = new Payment();

        $payment->invoice_id = 'INV-'.rand();
        $payment->patient_name = $request->patient_name;
        $payment->payment_type = $request->payment_type;
        $payment->paid_date = $request->paid_date;
        $payment->paid_amount = $request->paid_amount;

        $payment->save();
        return redirect('/admin/payment');
    }

    public function paymentDelete($id)
    {
        $payment = Payment::findOrFail($id);
        $payment->delete();
        

        return redirect('/admin/payment');
    }
}
