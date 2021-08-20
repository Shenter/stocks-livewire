<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/dashboard', 'App\Http\Controllers\DashboardController@show')->middleware(['auth'])->name('dashboard');
//Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
//    return view('dashboard');
//})->name('dashboard');


Route::middleware(['auth:sanctum', 'verified'])->group( function () {

    Route::get('/stocks', 'App\Http\Controllers\UserStocksController@index')->name('stocks');
    Route::get('/market', 'App\Http\Controllers\MarketController@show')->name('market.show');
});
Route::post('stock/{stock}/buy','App\Http\Controllers\MarketController@buy')->name('stock.buy');
