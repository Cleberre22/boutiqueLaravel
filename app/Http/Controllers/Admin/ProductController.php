<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        $categories = Category::all();
        return view('admin.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.products.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required',
            'description' => 'required',
            'quantite' => 'required',
            'categorie_id' => 'required',
            'ahead',
            'active',
            'image' => 'image|nullable|max: 1999',
        ]);

        if ($request->hasFile('image')) {
            // Get Filename
            $filenameWithExt = $request->file('image')->getClientOriginalName();
            // Get just Extension
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Filename To store
            $extension = $request->file('image')->getClientOriginalExtension();
            $fileNameToStore = $filename. '_' .time().'.'.$extension;
            // Upload
            $request->file('image')->storeAs('public/image', $fileNameToStore);
        }
        else {
            // Else add a dummy image
            $fileNameToStore = '';
        }
        
        Product::create([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'quantite' => $request->quantite,
            'categorie_id' => $request->categorie_id,
            'ahead',
            'active',
            'image' => $fileNameToStore
        ]);

        return redirect()->route('admin.products.index')
        ->with('success', 'Produit ajouté avec succès !');
}

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $products = Product::all();
        return view('admin.products.show',['products'=>$products]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = Category::all();
        $product = Product::findOrFail($id);
        return view('admin.products.edit', compact('product', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $updateProduct = $request->validate([
            'name' => 'required',
            'price' => 'required',
            'description' => 'required',
            'quantite' => 'required',
            'categorie_id' => 'required',
            'ahead',
            'active',
            'image' => 'image|nullable|max: 1999'
        ]);

        if ($request->hasFile('image')) {
            // if (Product::findOrFail($id)->image){
            //     unlink("storage/image/".Product::findOrFail($id)->image);
            // }
            $filenameWithExt = $request->file('image')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('image')->getClientOriginalExtension();
            $fileNameToStore = $filename. '_' .time().'.'.$extension;
            $request->file('image')->storeAs('public/image', $fileNameToStore);
            $updateHeroe['image'] = $fileNameToStore;
        }

        Product::findOrFail($id);
        Product::whereId($id)->update($updateProduct);
        return redirect()->route('admin.products.index')
            ->with('success', 'Le produit a été mis à jour avec succès !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        // if (Product::findOrFail($id)->image){
        //     unlink("storage/image/".Product::findOrFail($id)->image);
        // }
        $product->delete();
        return redirect()->route('admin.products.index')->with('success', 'Produit supprimé avec succès');
    }
}
