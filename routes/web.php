<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;

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

Route::get('/home', [Controller::class, 'overzicht'])->name('overzicht');

Route::get('/nieuw-product', [Controller::class, 'newProduct'])->name('nieuw-product');



//Sla een product op
Route::post('/product/opslaan', [Controller::class, 'productStore'])->name('product-store');


//Verwijder een product
Route::get('/product/verwijder/{id}', [Controller::class, 'productRemove'])->name('product-remove');

Route::get('/product-aanpassen/{id}', [Controller::class, 'editProductPage'])->name('nieuw-product');
//Pas een product aan
Route::post('/product/updaten/{id}', [Controller::class, 'updateProduct'])->name('product-update');

//Laat deze route onderaan, zodat de andere links eerst worden gecheckt door laravel
Route::get('/product/{id}', [Controller::class, 'productSingle'])->name('product-single');

Auth::routes();

