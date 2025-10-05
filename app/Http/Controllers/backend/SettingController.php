<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Company;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function setting()
    {
        $company = Company::first(); 
        return view('backend.setting.setting', compact('company'));
    }

    public function settingStore(Request $request)
    {
        $company = Company::first(); 

        if ($company) {
            $company->update([
                'company_name'   => $request->company_name,
                'contact_person' => $request->contact_person,
                'address'        => $request->address,
                'country'        => $request->country,
                'city'           => $request->city,
                'state'          => $request->state,
                'postal_code'    => $request->postal_code,
                'email'          => $request->email,
                'phone'          => $request->phone,
                'mobile'         => $request->mobile,
                'fax'            => $request->fax,
                'website'        => $request->website,
            ]);
        } else {
            Company::create([
                'company_name'   => $request->company_name,
                'contact_person' => $request->contact_person,
                'address'        => $request->address,
                'country'        => $request->country,
                'city'           => $request->city,
                'state'          => $request->state,
                'postal_code'    => $request->postal_code,
                'email'          => $request->email,
                'phone'          => $request->phone,
                'mobile'         => $request->mobile,
                'fax'            => $request->fax,
                'website'        => $request->website,
            ]);
        }

        return redirect()->back();
    }
}
