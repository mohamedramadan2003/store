<?php

use App\Http\Controllers\Api\AccessTokenController;
use App\Http\Controllers\Font\CartController;
use Illuminate\Http\Request;
use App\Http\Resources\HomeResource;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;


Route::get('/home', [HomeController::class , 'index']);
Route::middleware('auth:sanctum')->group(function () {
    //products
Route::get('/products', [ProductController::class, 'index']);
Route::post('/products', [ProductController::class, 'store']);
Route::put('/products', [ProductController::class, 'update']);
Route::get('/products/{slug}', [ProductController::class, 'show']);
Route::delete('/products', [ProductController::class, 'destroy']);
// carts
 Route::apiResource('carts',CartController::class);

 //catgory


});

  // auth and logout

Route::post('/register',[AccessTokenController::class , 'register'])->middleware('guest:sanctum');
Route::post('/auth-access-token' , [AccessTokenController::class , 'store'])
->middleware('guest:sanctum');
 Route::delete('logout/{token?}', [AccessTokenController::class, 'destroy'])
 ->middleware('auth:sanctum');

Route::prefix('admin')->group(function (){
Route::post('/register',[AccessTokenController::class , 'register'])->middleware('guest:sanctum');
Route::post('/auth-access-token' , [AccessTokenController::class , 'store'])
->middleware('guest:sanctum');
 Route::delete('logout/{token?}', [AccessTokenController::class, 'destroy'])
 ->middleware('auth:sanctum');
});
