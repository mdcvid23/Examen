<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductoController;

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

Route::get('/productos', [ProductoController::class, 'indexApi']);
Route::post('/productos/create', [ProductoController::class, 'createApi']);

Route::post('/productos/store', [ProductoController::class, 'storeApi']);
Route::post('/productos/filter', [ProductoController::class, 'filterApi']);

Route::delete('/productos/{id}', [ProductoController::class, 'destroyApi']);
Route::put('/productos/{id}', [ProductoController::class, 'updateApi']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
