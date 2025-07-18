<?php

namespace App\Http\Controllers\Font;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCartRequest;
use App\Models\Cart;
use App\Models\Product;
use App\Repositories\Cart\CartModelRepository;
use App\Repositories\Cart\CartRepository;
use Illuminate\Support\Facades\App;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(CartRepository $cart)
    {
       $data = $cart->get();
        return response()->json($data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCartRequest $request , CartRepository $cart)
    {
        $validated = $request->validated();
        $product = Product::findOrFail($request->post('product_id'));
        $data = $cart->add($product ,$request->post('quantity') );
        return response()->json(
            ['massage' => 'done' ,$data],200
        );
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request , CartRepository $cart)
    {
                $validated = $request->validated();
        $product = Product::findOrFail($request->post('product_id'));
        $data = $cart->update($product ,$request->post('quantity') );
        return response()->json(
            ['massage' => 'done' , $data],200
        );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CartRepository $cart ,$id)
    {
        $data = $cart->delete($id);
        return response()->json(
            ['massage' => 'done'],200
        );
    }
}
