<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Asset;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AssetsController extends Controller
{
  public function assets()
    {
        $assets = Asset::latest()->get();
        return view('backend.assets.assets', compact('assets'));
    }

    // Show add asset form
    public function assetsAdd()
    {
        return view('backend.assets.assets-add');
    }

    // Store new asset
    public function assetsStore(Request $request)
    {
        $request->validate([
            'asset_name' => 'required|string|max:255',
            'asset_user' => 'required|string|max:255',
        ]);

        $asset = new Asset();
        $asset->asset_name     = $request->asset_name;
        $asset->asset_id       = 'AST-' . strtoupper(Str::random(6)); 
        $asset->purchase_date  = $request->purchase_date;
        $asset->purchase_from  = $request->purchase_from;
        $asset->manufacturer   = $request->manufacturer;
        $asset->model          = $request->model;
        $asset->serial_number  = $request->serial_number;
        $asset->supplier       = $request->supplier;
        $asset->condition      = $request->condition;
        $asset->warranty       = $request->warranty;
        $asset->value          = $request->value;
        $asset->asset_user         = $request->asset_user;
        $asset->description    = $request->description;
        $asset->status         = $request->status ?? 'Pending';
        $asset->save();

        return redirect('/admin/assets');
    }

    // View single asset
    public function assetsView($id)
    {
        $asset = Asset::findOrFail($id);
        return view('backend.assets.assets-view', compact('asset'));
    }

    // Show edit asset form
    public function assetsEdit($id)
    {
        $asset = Asset::findOrFail($id);
        return view('backend.assets.assets-edit', compact('asset'));
    }

    // Update asset
    public function assetsUpdate(Request $request, $id)
    {
        $asset = Asset::findOrFail($id);
        $asset->asset_name     = $request->asset_name;
        $asset->purchase_date  = $request->purchase_date;
        $asset->purchase_from  = $request->purchase_from;
        $asset->manufacturer   = $request->manufacturer;
        $asset->model          = $request->model;
        $asset->serial_number  = $request->serial_number;
        $asset->supplier       = $request->supplier;
        $asset->condition      = $request->condition;
        $asset->warranty       = $request->warranty;
        $asset->value          = $request->value;
        $asset-> asset_user        = $request->asset_user;
        $asset->description    = $request->description;
        $asset->status         = $request->status ?? 'Pending';
        $asset->save();

        return redirect('/admin/assets');
    }

    // Delete asset
    public function assetsDelete($id)
    {
        $asset = Asset::findOrFail($id);
        $asset->delete();
        return redirect('/admin/assets');
    }
}
