<?php

namespace App\Http\Controllers;

use App\Models\Parameter;
use Illuminate\Http\Request;

class ParameterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $parameters = Parameter::whereIn('key', [
            'website_name', 'logo', 'url', 'address', 'email', 'phone', 'about_us',
            'twitter', 'facebook', 'instagram', 'skype', 'linkedin'
        ])->get()->keyBy('key')->map->value;
        return view('backend.pages.pengaturan.index', ['data' => $parameters]);
    }


    /**
     * Show the form for creating a new resource.
     */
    public function update(Request $request)
    {
        try {
            foreach ($request->except(['_token', '_method']) as $key => $value) {
                if ($key === 'logo' && $request->hasFile('logo')) {
                    $logo = $request->file('logo');
                    $filename = 'logo.' . $logo->getClientOriginalExtension();
                    $logo->move(public_path('uploads/logo/'), $filename);
                    Parameter::where('key', $key)->update([
                        'value' => $filename
                    ]);
                } else {
                    Parameter::where('key', $key)->update([
                        'value' => $value
                    ]);
                }
            }
            return redirect()->route('backend.pengaturan.index')->with([
                'alert'     => 'success',
                'message'   => 'Pengaturan berhasil diubah'
            ]);
        } catch (\Exception $e) {
            return redirect()->route('backend.pengaturan.index')->with([
                'alert'     => 'success',
                'message'   => $e->getMessage(),
            ]);
        }
    }
}
