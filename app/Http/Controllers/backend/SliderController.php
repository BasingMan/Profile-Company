<?php

namespace App\Http\Controllers\backend;

use App\Models\Slider;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $slider = Slider::all();

        return view ('backend.pages.slider.index', compact('slider'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.pages.slider.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'link' => 'required',
            'gambar' => 'required|file|mimes:png, jpg, jpeg',
            'subtitle' => 'required',
        ]);
        
        $slider = new Slider;

        $slider->title = $request->input('title');
        $slider->link = $request->input('link');
        $slider->subtitle = $request->input('subtitle');

        if($request->hasFile('gambar'))
        {
            $file = $request->file('gambar');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('uploads/slider/', $filename);
            $slider->gambar = $filename;
        }else{
            return redirect()->back()->with('error', 'Error uploading Image.');
        }

        $slider->save();

        return redirect()->route('backend.slider.index')->with('status','Slider Updated');
    }

    /**
     * Display the specified resource.
     */
    public function show(Slider $slider)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Slider $slider, $id)
    {
        $slider = Slider::findOrFail($id);

        return view('backend.pages.slider.edit', compact('slider'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Slider $slider, $id)
    {
        $request->validate([
            'title' => 'required',
            'link' => 'required',
            'gambar' => 'required|file|mimes:png, jpg, jpeg',
            'subtitle' => 'required',
        ]);
        
        $slider = Slider::findOrFail($id);

        if($request->hasFile('gambar'))
        {
            $file = $request->file('gambar');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('uploads/slider/', $filename);
            $slider->gambar = $filename;
        }else{
            return redirect()->back()->with('error', 'Error uploading Image.');
        }

        $slider->title = $request->input('title');
        $slider->link = $request->input('link');
        $slider->subtitle = $request->input('subtitle');

        $slider->save();

        return redirect()->route('backend.slider.index')->with('status','Slider Updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Slider::find($id)->delete();

        return redirect()->route('backend.slider.index')->with('status', 'Slider Deleted');
    }
}
