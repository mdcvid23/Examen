<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductoController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/productos', [ProductoController::class, 'index'])->name('productos.index');
Route::get('/productos/create', [ProductoController::class, 'create'])->name('productos.create');

Route::post('/productos/store', [ProductoController::class, 'store'])->name('productos.store');
Route::post('/productos/filter', [ProductoController::class, 'filter'])->name('productos.filter');

Route::delete('/productos/{id}', [ProductoController::class, 'destroy'])->name('productos.destroy');

Route::put('/productos/{id}', [ProductoController::class, 'update'])->name('productos.update');

Route::view('/','index',['productos' => []]);

Route::view('/create','create',['productos' => []])->name('create');
