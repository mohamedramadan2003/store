<?php
namespace App\Repositories\Cart;

use App\Models\Product;
use Illuminate\Database\Eloquent\Collection;

interface CartRepository
{
    public function get() : Collection ;
    public function add (Product $product, $quantity = 1);
    public function update($id , $quantity = 1);
    public function delete($id);
    public function empty();
    public function total():float;
}
