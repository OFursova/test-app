<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TransferController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
// for Vue frontend realization
Route::get('/{any}', [\App\Http\Controllers\SpaController::class,'index'])->where('any', '.*');
//Route::get('/token', [\App\Http\Controllers\SpaController::class,'token']);

// ServiceContainer practice
//Route::post('/go', [TransferController::class, 'transfer']);

Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

