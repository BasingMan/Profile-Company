<?php

namespace App\Http\Controllers\backend;

use App\Models\Testimoni;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class TestimoniController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $testi = Testimoni::all();
        return view('backend.pages.testimoni.index', compact('testi'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.pages.testimoni.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'company' => 'required',
            'rating' => 'required',
            'image_testi' => 'nullable|image|mimes:png, jpg, jpeg,',
            'testimoni' => 'required',
        ],[
            'image_testi.image' => 'it needs to be an image file',
            'image_testi.mimes' => 'the file must be png/jpg/jpeg',
        ]);
        
        $testi = new Testimoni;

        $testi->name = $request->input('name');
        $testi->company = $request->input('company');
        $testi->rating = $request->input('rating');
        $testi->testimoni = $request->input('testimoni');

        if($request->hasFile('image_testi'))
        {
            $file = $request->file('image_testi');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('uploads/testi/', $filename);
            $testi->image_testi = $filename;
        }else{
            return redirect()->back()->with('error', 'Error uploading Image_testi.');
        }

        $testi->save();

        return redirect()->route('backend.testi.index')->with('status','Testimoni Updated');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $testi = Testimoni::findOrFail($id);

        return view('backend.pages.testimoni.show', compact('testi'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $tes = Testimoni::findOrFail($id);

       return view('backend.pages.testimoni.edit', compact('tes'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Testimoni $testi, $id)
    {
        $request->validate([
            'name' => 'required',
            'company' => 'required',
            'rating' => 'required',
            'image_testi' => 'nullable|mimes:png,jpg,jpeg',
            'testimoni' => 'required', 
        ],[
            'image_testi.image' => 'it needs to be an image file',
            'image_testi.mimes' => 'the file must be png/jpg/jpeg',
        ]);
    
        $testi = Testimoni::findOrFail($id);
    

        if ($request->hasFile('image_testi')) {
            $oldImage_testi = $testi->image_testi;
            if ($oldImage_testi) {

                File::delete('uploads/testi' . $oldImage_testi);
            }
    
            $file = $request->file('image_testi');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('uploads/testi', $filename);
            $testi->image_testi = $filename;
        }
    

        $testi->name = $request->input('name');
        $testi->company = $request->input('company');
        $testi->rating = $request->input('rating');
        $testi->testimoni = $request->input('testimoni');
    

        $testi->save();
    
        return redirect()->route('backend.testi.index')->with('status', 'Testimoni has been Updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Testimoni $testimoni, $id)
    {
        Testimoni::find($id)->delete();

        return redirect()->route('backend.testi.index')->with('status', 'Testimoni Deleted');
    }
}
