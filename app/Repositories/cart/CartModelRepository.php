<?php

namespace App\Repositories\Cart;

use Carbon\Carbon;
use App\Models\Cart;
use App\Models\Product;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Request;
use Illuminate\Database\Eloquent\Collection;

class CartModelRepository implements CartRepository
{
    protected $items ;
    public function __construct(){
        $this->items = collect([]);
    }
    public function get(): Collection
    {
        if(!$this->items->count())
        {
             return Cart::with('product') ->get();
        }
        return $this->items ;
    }
    public function add(Product $product , $quantity  = 1)
    {
        $item = Cart::where('product_id','=',$product->id)
        ->first();
        if(!$item)
        {
            $cart =  Cart::create([
            'user_id' => Auth::id() ,
            'product_id' => $product->id ,
            'quantity' => $quantity ,
        ]);
        $this->get()->push($cart);
        return $cart ;
        }
       return $item->increment('quantity', $quantity);

    }
    public function update($id , $quantity = 1)
    {
        Cart::where('id' , $id)
        ->update([
            'quantity' => $quantity,
        ]);
    }
    public function delete($id)
    {
        Cart::where('product_id',$id)
        ->delete();
    }
    public function empty()
    {
        Cart::query()->delete();
    }
    public function total() :float
    {
       /*return (float) Cart::join('products' , 'products.id' , '=' , 'carts.product_id')
        ->selectRaw('SUM(products.price * carts.quantity) as total')
        ->value('total');*/
       return $this->get()->sum(function($item)
    {
        return $item->quantity * $item->product->price ;
    });
    }

}
