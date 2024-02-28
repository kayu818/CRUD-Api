<?php

use App\Http\Controllers\productController;
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

Route::get('/',[productController::class,'index']);

Route::get('create',[productController::class,'create']);

Route::post('/view/store',[productController::class,'store']);

Route::get('products/{id}/edit',[productController::class,'edit']);

Route::put('/view/{id}/update',[productController::class,'update']);

Route::delete('products/{id}/delete',[productController::class,'destroy']);

