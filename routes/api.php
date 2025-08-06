<?php

use Illuminate\Http\Request;
use App\Http\Resources\HomeResource;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CurrencyController;
use App\Http\Controllers\Font\CartController;
use App\Http\Controllers\Api\PaymentController;
use App\Http\Controllers\SocialLoginController;
use App\Http\Controllers\Api\AccessTokenController;


Route::post('/home', [HomeController::class , 'index'])->middleware('guest:sanctum');
Route::middleware('auth:sanctum')->group(function () {
    //products
Route::get('/products', [ProductController::class, 'index']);
Route::post('/products', [ProductController::class, 'store']);
Route::put('/products', [ProductController::class, 'update']);
Route::get('/products/{slug}', [ProductController::class, 'show']);
Route::delete('/products', [ProductController::class, 'destroy']);
// carts
 Route::apiResource('carts',CartController::class);

 Route::post('/convert-price' ,  [CurrencyController::class, 'convert']);
 //catgory


Route::post('/payment/pay', [PaymentController::class, 'pay']);
Route::post('/payment/verify', [PaymentController::class, 'verify']);

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


 //social login
 Route::get('/auth/{provider}/redirect' ,[SocialLoginController::class , 'redirect']);
  Route::get('/auth/{provider}/callback',[SocialLoginController::class , 'callback'] );

});
