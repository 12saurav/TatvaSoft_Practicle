<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventController;

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


Route::get('/',[EventController::class,'index'])->name('list.event');
Route::get('/add',[EventController::class,'create'])->name('create.event');
Route::post('/add',[EventController::class,'store'])->name('store.event');
Route::get('/edit/{id}',[EventController::class,'edit'])->name('edit.event');
Route::post('/edit/{id}',[EventController::class,'update'])->name('update.event');
Route::get('/delete/{id}',[EventController::class,'destroy'])->name('delete.event');
Route::get('/view/{id}',[EventController::class,'show'])->name('show.event');