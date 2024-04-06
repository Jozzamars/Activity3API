<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

use Illuminate\Http\Request;

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

