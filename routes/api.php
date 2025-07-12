<?php

use App\Http\Controllers\Api\AccessTokenController;
use Illuminate\Http\Request;
use App\Http\Resources\HomeResource;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
Route::get('/home', [HomeController::class , 'index']);
Route::apiResource( '/products', ProductController::class);
Route::get('/products/{slug}', [ProductController::class, 'show']);

Route::post('/auth-access-token' , [AccessTokenController::class , 'store'])
->middleware('guest:sanctum');

