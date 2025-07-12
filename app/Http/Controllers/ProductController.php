<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use GuzzleHttp\Psr7\Response;

class ProductController extends Controller
{
 
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
    public function show($slug)
{
    $product = Product::where('slug', $slug)->first();

    if (!$product) {
        return response()->json(['message' => 'المنتج غير موجود'], 404);
    }

    return response()->json($product);
}

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        $validated = $request->validated();
        $validated['slug'] = Str::slug($validated['name']);
          $update =  $product->update($validated);
        return response()->json([
            'massage' => 'تم تحديث المنتج بنجاح',
            $product
        ] , 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        if(!$product)
        {
             return response()->json([
           'massage' => 'المنتج غير موجود'
        ],404);
        }
        $product->delete();
        return response()->json([
           'massage' => 'delete is done'
        ],200);
    }
}
