<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientController;
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



Route::controller(App\Http\Controllers\FrontendController::class)->group( function(){
    Route::get('/', 'index');
});




Route::resource('clients', 'App\Http\Controllers\ClientController')->middleware('auth');
Route::resource('gadgets', 'App\Http\Controllers\GadgetController')->middleware('auth');
Route::post('clients/{id}/update', [App\Http\Controllers\ClientController::class,'update'])->middleware('auth');
Route::get('/sale/{id}', [App\Http\Controllers\GadgetController::class, 'sale'])->name('gadgets.sale');
Route::get('/remove/{id}', [App\Http\Controllers\GadgetController::class, 'remove'])->name('gadgets.remove');
Auth::routes();

Route::get('/home', [App\Http\Controllers\GadgetController::class, 'index'])->middleware('auth')->name('home');
