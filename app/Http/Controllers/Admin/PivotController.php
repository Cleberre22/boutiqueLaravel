<?php

namespace App\Http\Controllers\admin;

use App\Models\Product;
use App\Models\Promotion;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PivotController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        $promotions = Promotion::all();
        return view('admin.pivob n,t.index', compact('promotions', 'products'));
    }
}
