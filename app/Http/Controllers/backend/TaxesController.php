<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\ProvidentFund;
use App\Models\Taxes;
use Illuminate\Http\Request;

class TaxesController extends Controller
{
          public function taxes()
    {
        $taxes = Taxes::all();
        return view('backend.taxes.taxes', compact('taxes'));
    }

    public function taxesAdd()
    {
        return view('backend.taxes.taxes-add');
    }


    public function taxesStore(Request $request)
    {
        Taxes::create([
            'name' => $request->name,
            'percentage' => $request->percentage,
            'status' => $request->status
        ]);

        return redirect('/admin/taxes');
    }

    public function taxesView($id)
    {
        $tax = Taxes::findOrFail($id);
        return view('backend.taxes.taxes-view', compact('tax'));
    }

    public function taxesEdit($id)
    {
        $tax = Taxes::findOrFail($id);
        return view('backend.taxes.taxes-edit', compact('tax'));
    }


    public function taxesUpdate(Request $request, $id)
    {
        $tax = Taxes::findOrFail($id);
        $tax->update([
            'name' => $request->name,
            'percentage' => $request->percentage,
            'status' => $request->status
        ]);

        return redirect('/admin/taxes');
    }


    public function taxesDelete($id)
    {
        $tax = Taxes::findOrFail($id);
        $tax->delete();

        return redirect('/admin/taxes');
    }
}
