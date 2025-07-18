<?php

namespace App\Repositories\Cart;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class CartModelRepository implements CartRepository
{
    public function get(): \Ramsey\Collection\Collection
    {
        return Cart::get();
    }
    public function add(Product $product , $quantity  = 1)
    {
        return Cart::create([
            'cookie_id' => Str::uuid(),
            'user_id' => Auth::id() ,
            'product_id' => $product->id ,
            'quantity' => $quantity ,
        ]);
    }
    public function update(Product $product , $quantity = 1)
    {
        
    }

}
