<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Resources\HomeResource;
use Illuminate\Support\Facades\Gate;
use App\Http\Resources\ProductResource;

class HomeController extends Controller
{
    public function index()
    {
            $products = Product::inRandomOrder()->take(6)->get();
            return ProductResource::collection($products);
    }
}
