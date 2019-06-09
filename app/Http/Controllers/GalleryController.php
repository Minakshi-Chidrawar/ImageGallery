<?php

namespace App\Http\Controllers;

use App\Gallery;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    public function index()
    {
        $galleries = Gallery::all();

        return view('gallery.gallery')
            ->with('galleries', $galleries);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $request->validate([
            'gallery_name' => 'required|min:3'
        ]);
        
        $gallery = new Gallery;

        //save a new gallery
        $gallery->name = $request->gallery_name;
        $gallery->created_by = 1;
        $gallery->published = 1;
        $gallery->save();

        return redirect()->back();

    }

    public function show(Gallery $gallery)
    {
        //
    }

    public function edit(Gallery $gallery)
    {
        //
    }

    public function update(Request $request, Gallery $gallery)
    {
        //
    }

    public function destroy(Gallery $gallery)
    {
        //
    }
   
    public function viewGalleryPics($id)
    {
        $gallery = Gallery::findOrFail($id);

        return view('gallery.viewGallery', compact('gallery'));
    }
    
    public function uploadImage(Request $request)
    {
        // Get the file from the post request
        $file = $request->file('file');

        // Set the filename
        $filename = uniqid() . $file->getClientOriginalExtension();

        // Move the file to the expected location
        $file->move('gallery/images', $filename);
        dd($file->getClientSize());
        // Save the image details into the database
        $gallery = Gallery::findOrFail($request->input('gallery_id'));
        $image = $gallery->images()->create([
            'gallery_id' => $request->input('gallery_id'),
            'file_name' => $filename,
            'file_path' => 'gallery/images/' . $filename,
            'created_by' => '1',
        ]);
    }
}
