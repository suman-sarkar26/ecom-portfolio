<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\ProductsController;
use App\Http\Controllers\api\OrderController;

Route::get('/products', [ProductsController::class, 'getAll']);
Route::post('/single-product', [ProductsController::class, 'singleProduct']);
Route::post('/place-order', [OrderController::class, 'Order']);

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
