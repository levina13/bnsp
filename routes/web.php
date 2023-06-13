<?php

use App\Http\Controllers\dashboard;
use App\Http\Controllers\faktorial;
use App\Http\Controllers\pangkat;
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


Route::controller(dashboard::class)->group(function(){
    Route::get('/', 'show')->name('page.dashboard');
});
Route::controller(pangkat::class)->group(function () {
    Route::get('/hitung-pangkat', 'hitungPage')->name('page.pangkat');
    Route::post('/hitung-pangkat','hitung')->name('hitung.pangkat');
    Route::get('/tabel-pangkat', 'table')->name('tabel.pangkat');

});
Route::controller(faktorial::class)->group(function () {
    Route::get('/hitung-faktorial', 'hitungPage')->name('page.faktorial');
    Route::post('/hitung-faktorial', 'hitung')->name('hitung.faktorial');
    Route::get('/tabel-faktorial','table')->name('tabel.faktorial');
});