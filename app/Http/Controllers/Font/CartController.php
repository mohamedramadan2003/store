<?php

namespace App\Http\Controllers\Font;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCartRequest;
use App\Models\Product;
use App\Repositories\Cart\CartModelRepository;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $repository = new CartModelRepository();
       $data = $repository->get();
        return response()->json($data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCartRequest $request)
    {
        $validated = $request->validated();
        $product = Product::findOrFail($request->post('product_id'));
        $repository = new CartModelRepository();
        $data = $repository->add($product ,$request->post('quantity') );
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
                $validated = $request->validated();
        $product = Product::findOrFail($request->post('product_id'));
        $repository = new CartModelRepository();
        $data = $repository->update($product ,$request->post('quantity') );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
