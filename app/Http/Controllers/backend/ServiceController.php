<?php

namespace App\Http\Controllers\backend;

use App\Models\Service;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ser = Service::paginate(5);

        return view('backend.pages.service.index', compact('ser'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.pages.service.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
            $request->validate([
                'title' => 'required',
                'text' => 'required',
                'image_ser' => 'required|image|mimes:png,jpg,jpeg|max:1024',
            ], [
                'image_ser.required'=>'the image field is Required',
                'image_ser.image' => 'the file must be image',
                'image_ser.mimes' => 'the image must be png/jpg/jpeg',
                'image_ser.max' => 'the image file must be 1MB or lower',
            ]);

            $ser = new Service;

            $ser->title = $request->input('title');
            $ser->text = $request->input('text');

            if($request->hasFile('image_ser')) {
                $file = $request->file('image_ser');
                $extension = $file->getClientOriginalExtension();
                $filename = time().'.'.$extension;
                $file->move('uploads/ser/', $filename);
                $ser->image_ser = $filename;
            }

            $ser->save();

            return redirect()->route('backend.ser.index')->with([
                'alert'=>'success',
                'message'=>'Service has been added',
            ]);

    }

    /**
     * Display the specified resource.
     */
    public function show(Service $service)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Service $service, $id)
    {
        $ser = Service::findOrFail($id);

        return view('backend.pages.service.edit', compact('ser'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Service $service, $id)
    {
        try{
            $request->validate([
                'title' => 'required',
                'text' => 'required',
                'image_ser' => 'nullable|image|mimes:png,jpg,jpeg|max:1024',
            ], [
                'image_ser.image' => 'the file must be image',
                'image_ser.mimes' => 'the image must be png/jpg/jpeg',
                'image_ser.max' => 'the image file must be 1MB',
            ]);

            $ser = Service::findOrFail($id);

            if($request->hasFile('image_ser')) {
                $oldImage = $ser->image_ser;
                if($oldImage){
                    File::delete('uploads/ser/' . $oldImage);
                }

                $file = $request->file('image_ser');
                $extension = $file->getClientOriginalExtension();
                $filename = time().'.'.$extension;
                $file->move('uploads/ser/' , $filename);
                $ser->image_ser = $filename;
            }

            $ser->title = $request->input('title');
            $ser->text = $request->input('text');

            $ser->save();

            return redirect()->route('backend.ser.index')->with([
                'alert'=>'success',
                'message'=>'Service Updated',
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
            Service::find($id)->delete();

            return redirect()->route('backend.ser.index')->with([
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
