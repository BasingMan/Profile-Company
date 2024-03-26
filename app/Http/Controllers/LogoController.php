<?php

namespace App\Http\Controllers;

use App\Models\Logo;
use Illuminate\Http\Request;

class LogoController extends Controller
{
    public function index()
    {
        $logo = Logo::first();

        // dd($logo);
        return view('backend.pages.logo.index', compact('logo'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'logo_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', 
        ], [
            'logo_image.required' => 'The Logo is required',
            'logo_image.image' => 'File must be an image',
            'logo_image.mimes' => 'File must be PNG, JPG, or JPEG',
            'logo_image.max' => 'File must 2MB or lower',
        ]);

        $logo = Logo::first();
        
        if ($logo && $logo->logo_image) {
            $oldImagePath = public_path('uploads/logo/') . $logo->logo_image;
            if (file_exists($oldImagePath)) {
                unlink($oldImagePath);
            }
        }
        
        if($request->hasFile('logo_image')) {
            $file = $request->file('logo_image');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('uploads/logo/', $filename);
            
            if ($logo) {
                $logo->update(['logo_image' => $filename]);
            } else {
                Logo::create(['logo_image' => $filename]);
            }
        }

        return redirect()->back()->with([
            'alert' => 'success',
            'message' => 'Logo Update Successfully'
        ]);
    }
}
