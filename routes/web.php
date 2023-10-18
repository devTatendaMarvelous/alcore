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

Route::get('/', function () {
    return view('welcome');
});

Route::resource('clients', 'App\Http\Controllers\ClientController');
Route::resource('gadgets', 'App\Http\Controllers\GadgetController');
Route::resource('accessories', 'App\Http\Controllers\AccessoryController');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
