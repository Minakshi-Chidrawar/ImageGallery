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
   
    public function viewGalleryPics()
    {
        
    }
    
    public function uploadImage(Request $request)
    {
        
    }
}
