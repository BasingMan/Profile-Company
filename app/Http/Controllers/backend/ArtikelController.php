<?php

namespace App\Http\Controllers\backend;

use App\Models\Artikel;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ArtikelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $art = Artikel::all();

        return view('backend.pages.artikel.index', compact('art'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.pages.artikel.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'header' => 'required',
            'article' => 'required',
            'image_art' => 'required|image|mimes:png,jpg,jpeg',
            'tgl' => 'required|date',
        ], [
            'image_art.image' => 'File must be an image',
            'image_art.mimes' => 'File must be PNG, JPG, or JPEG',
            'tgl.required' => 'Date is required',
        ]);
        
        $art = new Artikel;
        
        $art->header = $request->input('header');
        $art->article = $request->input('article');
        $firstParagraph = '';
            if(preg_match('/<p>(.*?)<\/p>/', $request->input('article'), $matches)) {
                $firstParagraph = strip_tags($matches[1]);
}
        $art->text_prev = $firstParagraph;
        $art->tgl = $request->input('tgl');
        
        if ($request->hasFile('image_art')) {
            $file = $request->file('image_art');
            if ($file->isValid()) {
                $extension = $file->getClientOriginalExtension();
                $filename = time().'.'.$extension;
                $file->move('uploads/art/', $filename);
                $art->image_art = $filename;
            } else {
                return redirect()->back()->with('error', 'Error uploading image.');
            }
        }
        
        $art->save();
        
        return redirect()->route('backend.art.index')->with('status', 'Article Updated');
        
    }

    /**
     * Display the specified resource.
     */
    public function show(Artikel $art, $id)
    {
        $art = Artikel::find($id);

        return view ('backend.pages.artikel.show', compact('art'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Artikel $art, $id)
    {
        $art = Artikel::find($id);

        return view('backend.pages.artikel.edit', compact('art'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Artikel $artikel, $id)
    {
        $request->validate([
            'header' => 'required',
            'article' => 'required',
            'image_art' => 'required|image|mimes:png,jpg,jpeg',
            'tgl' => 'required|date',
        ], [
            'image_art.image' => 'File must be an image',
            'image_art.mimes' => 'File must be PNG, JPG, or JPEG',
            'tgl.required' => 'Date is required',
        ]);
        
        $art = Artikel::findOrFail($id);
        
        $art->header = $request->input('header');
        $art->article = $request->input('article');
        $firstParagraph = '';
            if(preg_match('/<p>(.*?)<\/p>/', $request->input('article'), $matches)) {
                $firstParagraph = strip_tags($matches[1]);
}
        $art->text_prev = $firstParagraph;
        $art->tgl = $request->input('tgl');
        
        if ($request->hasFile('image_art')) {
            $file = $request->file('image_art');
            if ($file->isValid()) {
                $extension = $file->getClientOriginalExtension();
                $filename = time().'.'.$extension;
                $file->move('uploads/art/', $filename);
                $art->image_art = $filename;
            } else {
                return redirect()->back()->with('error', 'Error uploading image.');
            }
        }
        
        $art->save();
        
        return redirect()->route('backend.art.index')->with('status', 'Article Updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Artikel::find($id)->delete();

        return redirect()->route('backend.art.index')->with('status', 'Article Deleted');
    }
}
