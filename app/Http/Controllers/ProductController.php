<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

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
        return view('products.index', compact('products'));
    }
    
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show($id, Request $request, Product $produit)
    {
        $product = Product::findOrFail($id);
        // if($produit->active || $request->user()->admin) {
            return view('products.show', compact('product'));
        
        return redirect(route('products.index'));
    }
}
