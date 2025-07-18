<?php
namespace App\Repositories\Cart;

use App\Models\Product;
use Ramsey\Collection\Collection;

interface CartRepository
{
    public function get() : Collection ;
    public function add (Product $product, $quantity = 1);
    public function update(Product $product , $quantity = 1);
    public function delete(Product $product);
    public function empty();
    public function total():float;
}
