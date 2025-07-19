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
    protected $cart ;
        public function __construct(CartRepository $cart)
    {
        $this->cart = $cart ;
    }
    public function index()
    {
       $data = $this->cart->get();
       if($data)
       {
            return response()->json([
                'massage' => 'لا يوجد منتجات في السلة'
            ]);
       }
        return response()->json($data ,200);
    }


    public function store(StoreCartRequest $request)
    {
        $validated = $request->validated();
        $product = Product::findOrFail($request->post('product_id'));
        $data = $this->cart->add($product ,$request->post('quantity') );
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
    public function update(Request $request)
    {
                $validated = $request->validated();
        $product = Product::findOrFail($request->post('product_id'));
        $data = $this->cart->update($product ,$request->post('quantity') );
        return response()->json(
            ['massage' => 'done' , $data],200
        );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $data = $this->cart->delete($id);
        return response()->json(
            ['massage' => 'done'],200
        );
    }
}
