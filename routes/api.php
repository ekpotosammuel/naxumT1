<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\OrderController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('category')->group(function(){
    Route::get('/', [CategoryController::class, 'index']);

});

Route::prefix('order')->group(function(){
    Route::get('/', [OrderController::class, 'index']);
    Route::get('/search/{id}', [OrderController::class, 'fetchByInvoice']);
    // Route::get('/', [OrderController::class, 'fetchByInvoicek']);
});
Route::prefix('search-by-date')->group(function(){
    Route::get('/', [OrderController::class, 'fetchByDate']);
});
