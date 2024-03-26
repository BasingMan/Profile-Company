<?php

namespace App\Http\Controllers\backend;

use App\Models\Portofolio;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class PortofolioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $porto = Portofolio::paginate(5);

        return view('backend.pages.portofolio.index', compact('porto'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.pages.portofolio.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

            $request->validate([
                'judul' => 'required',
                'link' => 'required',
                'image' => 'required|image|mimes:png,jpg,jpeg|max:3072',
                'description' => 'required',
            ], [
                'image.required'=>'the image field is Required',
                'image.image' => 'the file must be image',
                'image.mimes' => 'the image must be png/jpg/jpeg',
                'image.max' => 'the image size must be 3MB or lower',
            ]);
            
            $porto = new Portofolio;

            $porto->judul = $request->input('judul');
            $porto->link = $request->input('link');
            $porto->description = $request->input('description');

            if($request->hasFile('image'))
            {
                $file = $request->file('image');
                $extension = $file->getClientOriginalExtension();
                $filename = time().'.'.$extension;
                $file->move('uploads/porto/', $filename);
                $porto->image = $filename;
            }

            $porto->save();

            return redirect()->route('backend.porto.index')->with([
                'alert'=>'success',
                'message'=>'Portofolio added.'
            ]);
        
    }

    /**
     * Display the specified resource.
     */
    public function show(Portofolio $portofolio)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
       $portofolio = Portofolio::findOrfail($id);

       return view('backend.pages.portofolio.edit', compact('portofolio'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Portofolio $porto, $id)
    {   
        
            $request->validate([
                'judul' => 'required',
                'link' => 'required',
                'description' => 'required',
                'image' => 'nullable|image|mimes:png,jpg,jpeg|max:3072',
            ], [
                'image.image' => 'the file must be image',
                'image.mimes' => 'the image must be png/jpg/jpeg',
                'image.max' => 'the image size must be 3MB or lower',
            ]);
        
            $porto = Portofolio::findOrFail($id);
        

            if ($request->hasFile('image')) {
                $oldImage = $porto->image;
                if ($oldImage) {

                    File::delete('uploads/porto' . $oldImage);
                }
        
                $file = $request->file('image');
                $extension = $file->getClientOriginalExtension();
                $filename = time() . '.' . $extension;
                $file->move('uploads/porto', $filename);
                $porto->image = $filename;
            }
        

            $porto->judul = $request->input('judul');
            $porto->link = $request->input('link');
            $porto->description = $request->input('description');
        

            $porto->save();
        
            return redirect()->route('backend.porto.index')->with([
                'alert'=>'success',
                'message'=>'Success updating portfolio.',
            ]);
            
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try{
            Portofolio::find($id)->delete();

            return redirect()->route('backend.porto.index')->with([
                'alert'=>'success',
                'message'=>'Successfully deleted'
            ]);
        } catch (\Exception $e){
            return redirect()->back()->with([
                'alert'=>'success',
                'message'=> $e->getMessage(),
            ]);
        }
    }
}
