<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ImageProduct;

class ImageProductUploadController extends Controller
{
    public function index()
    {
        return view('imageProduct-upload');
    }
    public function upload(Request $request)
    {
        
        $validatedData = $request->validate([
         'imageProduct' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ]);
        $name = $request->file('imageProduct')->getClientOriginalName();
        $path = $request->file('imageProduct')->store('public/uploads');
        $save = new ImageProduct;
        $save->name = $name;
        $save->path = $path;
        $save->save();
        return redirect('imageProduct')->with('status', 'L\'image de votre produit a bien été téléchargé !');
    }
}
