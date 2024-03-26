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
        $testi = Testimoni::paginate(5);
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
                'image_testi' => 'nullable|mimes:png,jpg,jpeg|max:1024',
                'testimoni' => 'required',
            ], [
                'image_testi.mimes' => 'The file must be png/jpg/jpeg',
                'image_testi.max' => 'the image size must be 1MB or lower'
            ]);
            
            $testi = new Testimoni;
            
            $testi->name = $request->input('name');
            $testi->company = $request->input('company');
            $testi->rating = $request->input('rating');
            $testi->testimoni = $request->input('testimoni');
            
            if ($request->hasFile('image_testi')) {
                $file = $request->file('image_testi');
                $extension = $file->getClientOriginalExtension();
                $filename = time().'.'.$extension;
                $file->move('uploads/testi/', $filename);
                $testi->image_testi = $filename;
            }
            
            $testi->save();
            
            return redirect()->route('backend.testi.index')->with([
                'alert'=>'success',
                'message'=>'New Testimoni has been added.',
            ]);
        
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
                'image_testi' => 'nullable|mimes:png,jpg,jpeg|max:1024',
                'testimoni' => 'required', 
            ],[
                'image_testi.mimes' => 'the file must be png/jpg/jpeg',
                'image_testi.max' => 'the image size must be 1MB or lower',
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
        
            return redirect()->route('backend.testi.index')->with([
                'alert'=>'success',
                'message'=>'Testimoni updated',
            ]);
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Testimoni $testimoni, $id)
    {
        try{
            Testimoni::find($id)->delete();

            return redirect()->route('backend.testi.index')->with([
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
