<?php

namespace App\Http\Controllers;

use index;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
      /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        // $products = Product::whereActive(true)->get();
        return view('home', compact('products'));
    }
}
