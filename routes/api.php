<?php

use App\Http\Controllers\v1\ClientController;
use App\Http\Controllers\v1\OrderController;
use App\Http\Controllers\v1\ProductController;
use App\Http\Controllers\v1\ProductTypeController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('v1')->group(function (){
    Route::apiResource('clients', ClientController::class);
    Route::apiResource('products', ProductController::class);
    Route::apiResource('products-types', ProductTypeController::class);
    Route::apiResource('orders', OrderController::class);
});
