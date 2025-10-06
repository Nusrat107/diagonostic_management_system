<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\ThemeSetting;
use Illuminate\Http\Request;

class ThemeController extends Controller
{
  public function theme()
    {
        $theme = ThemeSetting::first() ?? new ThemeSetting();
        return view('backend.theme.theme', compact('theme'));
    }

    /**
     * Store or update the theme settings.
     */
    public function themeStore(Request $request)
    {
        $theme = ThemeSetting::first() ?? new ThemeSetting();

        // Update website name
        $theme->website_name = $request->website_name;

        // Define upload path
        $uploadPath = public_path('backend/images/theme/');

        // Create folder if not exists
        if (!file_exists($uploadPath)) {
            mkdir($uploadPath, 0755, true);
        }

        // Upload light logo if present
        if ($request->hasFile('light_logo')) {
            $theme->light_logo = $this->uploadFile($request->file('light_logo'), $uploadPath, 'light_logo');
        }

        // Upload favicon if present
        if ($request->hasFile('favicon')) {
            $theme->favicon = $this->uploadFile($request->file('favicon'), $uploadPath, 'favicon');
        }

        $theme->save();

        return redirect()->back()->with('success', 'Theme settings updated successfully!');
    }

    /**
     * Handle file upload and return the path.
     */
    private function uploadFile($file, $path, $prefix)
    {
        $imageName = $prefix . '_' . time() . '.' . $file->extension();
        $file->move($path, $imageName);
        return 'backend/images/theme/' . $imageName;
    }
}
