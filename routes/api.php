<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Route::get('/products', [ProductController::class, 'index']);
// Route::post('/products', [ProductController::class, 'store']);
// Route::get('/products/{id}', [ProductController::class, 'show']);
// Route::put('products/{id}', [ProductController::class, 'update']);
// Route::delete('products/{id}', [ProductController::class, 'destroy']);
//Route::apiResource('products', ProductController::class);

//export PATH=/opt/lampp/bin:$PATH

Route::get('/test', function () {
    return response()->json(['message' => 'GET request']);
})->middleware('token.checker');

Route::post('/test', function () {
    return response()->json(['message' => 'POST request']);
})->middleware('token.checker');

Route::put('/test', function () {
    return response()->json(['message' => 'PUT request']);
})->middleware('token.checker');

Route::patch('/test', function () {
    return response()->json(['message' => 'PATCH request']);
})->middleware('token.checker');

Route::delete('/test', function () {
    return response()->json(['message' => 'DELETE request']);
})->middleware('token.checker');

