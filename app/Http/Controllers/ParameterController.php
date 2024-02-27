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
            'website_name', 'url', 'address', 'email', 'phone', 'about_us',
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
                Parameter::where('key', $key)->update([
                    'value' => $value
                ]);
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
