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
        try{
            $request->validate([
                'title' => 'required',
                'link' => 'required',
                'gambar' => 'required|file|mimes:png,jpg,jpeg',
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
                throw new \Exception('Error adding image.');
            }

            $slider->save();

            return redirect()->route('backend.slider.index')->with([
                'alert'=>'success',
                'message'=>'Slidder has been added',
            ]);
        }catch(\Exception $e){
            return redirect()->back()->with([
                'alert'=>'success',
                'message'=>$e->getMessage(),
            ]);

        }
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
        try{
            $request->validate([
                'title' => 'required',
                'link' => 'required',
                'gambar' => 'required|file|mimes:png,jpg,jpeg',
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
                throw new \Exception('Erro updating the image');
            }

            $slider->title = $request->input('title');
            $slider->link = $request->input('link');
            $slider->subtitle = $request->input('subtitle');

            $slider->save();

            return redirect()->route('backend.slider.index')->with([
                'alert'=>'success',
                'message'=>'Slider is Updated'
            ]);
        }catch(\Exception $e){
            return redirect()->back()->with([
                'alert'=>'success',
                'message'=>$e->getMessage(),
            ]);
        }
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
                'message'=>'Successfullt deleted',
            ]);
        }catch(\Exception $e){
            return redirect()->back()->with([
                'alert'=>'success',
                'message'=>$e->getMessage(),
            ]);
        }
    }
}
