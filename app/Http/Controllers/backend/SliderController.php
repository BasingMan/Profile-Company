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
        $slider = Slider::paginate(5);

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
                'gambar' => 'required|image|mimes:png,jpg,jpeg|max:2048',
                'subtitle' => 'required',
            ], [
                'gambar.image' => 'must be image file',
                'gambar.mimes' => 'use PNG/JPG/JPEG only',
                'gambar.max' =>'the image size must be 2MB or lower',
            ]);
            
            $slider = new Slider;

            $slider->title = $request->input('title');
            $slider->subtitle = $request->input('subtitle');

            if($request->hasFile('gambar'))
            {
                $file = $request->file('gambar');
                $extension = $file->getClientOriginalExtension();
                $filename = time().'.'.$extension;
                $file->move('uploads/slider/', $filename);
                $slider->gambar = $filename;
            }

            $slider->save();

            return redirect()->route('backend.slider.index')->with([
                'alert'=>'success',
                'message'=>'Banner has been added',
            ]);

    }

    /**
     * Display the specified resource.
     */
    public function show(Slider $slider, $id)
    {
        $slider = Slider::find($id);

        return view ('backend.pages.slider.show', compact('slider'));
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
                'gambar' => 'nullable|image|mimes:png,jpg,jpeg|max:2048',
                'subtitle' => 'required',
            ], [
                'gambar.image' => 'must be image file',
                'gambar.mimes' => 'use PNG/JPG/JPEG only',
                'gambar.max' =>'the image size must be 2MB or lower',
            ]);
            
            $slider = Slider::findOrFail($id);

            if($request->hasFile('gambar'))
            {
                $file = $request->file('gambar');
                $extension = $file->getClientOriginalExtension();
                $filename = time().'.'.$extension;
                $file->move('uploads/slider/', $filename);
                $slider->gambar = $filename;
            }

            $slider->title = $request->input('title');
            $slider->subtitle = $request->input('subtitle');

            $slider->save();

            return redirect()->route('backend.slider.index')->with([
                'alert'=>'success',
                'message'=>'Banner is Updated'
            ]);
       
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try{
            Slider::find($id)->delete();

            return redirect()->route('backend.slider.index')->with([
                'alert'=>'success',
                'message'=>'Successfully deleted',
            ]);
        }catch(\Exception $e){
            return redirect()->back()->with([
                'alert'=>'success',
                'message'=>$e->getMessage(),
            ]);
        }
    }
}
