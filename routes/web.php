<?php

use App\Http\Controllers\Med_controller;
use App\Http\Controllers\PurchaseController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/',[Med_controller::class,'index'])->name('index');

Route::get('/addProduct',[Med_controller::class,'product'])->name('add_product');
Route::post('/addProduct',[Med_controller::class,'create_product'])->name('create_product');

Route::get('/showProduct',[Med_controller::class,'show_product'])->name('show_product');
Route::get('/showProduct/delete/{id}',[Med_controller::class,'del_product'])->name('del_product');

/// purchases ///

Route::get('/purchases/create',[PurchaseController::class,'create'])->name('purchases.create');
Route::post('/purchases',[PurchaseController::class,'store'])->name('purchases.store');
