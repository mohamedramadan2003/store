<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Requests\StoreProductRequest;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        return Product::filter($request->query())->paginate(5);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductRequest $request)
    {
            $validated = $request->validated();
            $validated['slug'] = Str::slug($validated['name']);
            if ($request->hasFile('image')) {
                    $imagePath = $request->file('image')->store('products', 'public');
                    $validated['image'] = $imagePath;
                                                 }
            $product =  Product::create($validated);
             return response()->json($product, 201);

    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {

    }
}
