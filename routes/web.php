<?php

use App\Http\Controllers\CompaniaController;
use App\Http\Controllers\EmpleadoController;
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


Auth::routes();

Route::controller(CompaniaController::class)->group(function(){
    Route::get('/', 'index')->name('index.compania');
    Route::post('add', 'store')->name('store.compania');
    Route::get('edit/{id}', 'edit')->name('edit.compania');
    Route::put('update/{compania}', 'update')->name('update.compania');
    Route::get('delete/{id}', 'destroy')->name('destroy.compania');
    Route::get('show/{id}', 'show')->name('show.compania');
});

Route::controller(EmpleadoController::class)->group(function(){
    Route::post('add/empleado', 'store')->name('store.empleado');
    Route::get('show/empleado/{id}', 'show')->name('show.empleado');
    Route::get('edit/empleado/{id}', 'edit')->name('edit.empleado');
    Route::put('update/empleado/{empleado}', 'update')->name('update.empleado');
    Route::get('delete/empleado/{id}', 'destroy')->name('destroy.empleado');
});

