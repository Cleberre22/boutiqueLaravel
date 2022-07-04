<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use App\Models\Promotion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class PromotionController extends Controller
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
        return view('admin.promotions.index', compact('promotions', 'products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $products = Product::all();
        $promotions = Promotion::all();
        return view('admin.promotions.create',compact('promotions', 'products'));
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
            'description' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
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
        $promotion = Promotion::create([
            'name' => $request->name,
            'description' => $request->description,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'image' => $fileNameToStore
        ]);

        $products = $request->products;
        for ($i = 0; $i < count($products); $i++) {
            $product = Product::find($products[$i]);
            $promotion->product()->attach($product);
          }
      

        return redirect()->route('admin.promotions.index')
        ->with('success', 'Promotion ajouté avec succès !');
}

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id, Request $request)
    {
        $products = DB::table('products')
        ->join('product_promotion', 'products.id', '=', 'product_promotion.product')
        ->get()
        ->toArray();

        $products = Product::all();
        $promotion = Promotion::findOrFail($id);
        return view('admin.promotions.edit', compact('products', 'promotion'));
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
        $updatePromotion = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'image' => 'image|nullable|max: 1999',
        ]);

        if ($request->hasFile('image')) {
            // if (Product::findOrFail($id)->image){
            //     unlink("storage/image/".Promotion::findOrFail($id)->image);
            // }
            $filenameWithExt = $request->file('image')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('image')->getClientOriginalExtension();
            $fileNameToStore = $filename. '_' .time().'.'.$extension;
            $request->file('image')->storeAs('public/image', $fileNameToStore);
            $updateHeroe['image'] = $fileNameToStore;
        }

        Promotion::findOrFail($id)->product()->sync($request->products);
        Promotion::findOrFail($id);
        Promotion::whereId($id)->update($updatePromotion);
        return redirect()->route('admin.promotions.index')
            ->with('success', 'La promotion a été mise à jour avec succès !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $promotion = Promotion::findOrFail($id);
        // if (Product::findOrFail($id)->image){
        //     unlink("storage/image/".Promotion::findOrFail($id)->image);
        // }
        $promotion->delete();
        return redirect()->route('admin.promotions.index')->with('success', 'Promotion supprimé avec succès');
    }
}
