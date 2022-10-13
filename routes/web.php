<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CountryController as C;
use App\Http\Controllers\HotelController as M;
use App\Http\Controllers\HomeController as H;
use App\Http\Controllers\OrderController as O;

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



Auth::routes();

Route::get('/', [H::class, 'homeList'])->name('home')->middleware('gate:home');
Route::put('/rate/{hotel}', [H::class, 'rate'])->name('rate')->middleware('gate:user');





Route::prefix('country')->name('c_')->group(function () {
    Route::get('/', [C::class, 'index'])->name('index')->middleware('gate:user');
    Route::get('/create', [C::class, 'create'])->name('create')->middleware('gate:admin');
    Route::post('/create', [C::class, 'store'])->name('store')->middleware('gate:admin');
    Route::get('/show/{country}', [C::class, 'show'])->name('show')->middleware('gate:user');
    Route::delete('/delete/{country}', [C::class, 'destroy'])->name('delete')->middleware('gate:admin');
    Route::get('/edit/{country}', [C::class, 'edit'])->name('edit')->middleware('gate:admin');
    Route::put('/edit/{country}', [C::class, 'update'])->name('update')->middleware('gate:admin');
});

Route::prefix('hotel')->name('m_')->group(function () {
    Route::get('/', [M::class, 'index'])->name('index')->middleware('gate:user');
    Route::get('/create', [M::class, 'create'])->name('create')->middleware('gate:admin');
    Route::post('/create', [M::class, 'store'])->name('store')->middleware('gate:admin');
    Route::get('/show/{hotel}', [M::class, 'show'])->name('show')->middleware('gate:user');
    Route::delete('/delete/{hotel}', [M::class, 'destroy'])->name('delete')->middleware('gate:admin');
    Route::get('/edit/{hotel}', [M::class, 'edit'])->name('edit')->middleware('gate:admin');
    Route::put('/edit/{hotel}', [M::class, 'update'])->name('update')->middleware('gate:admin');
});


Route::prefix('order')->name('o_')->group(function () {
    Route::get('/', [O::class, 'index'])->name('index')->middleware('gate:user');
    Route::post('/create', [O::class, 'store'])->name('store')->middleware('gate:user');
    Route::delete('/delete/{order}', [O::class, 'destroy'])->name('delete')->middleware('gate:admin');
    Route::get('/edit/{order}', [O::class, 'edit'])->name('edit')->middleware('gate:admin');
    Route::put('/edit/{order}', [O::class, 'update'])->name('update')->middleware('gate:admin');
});