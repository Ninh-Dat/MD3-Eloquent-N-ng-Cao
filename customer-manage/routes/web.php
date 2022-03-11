<?php

use App\Http\Controllers\CityController;
use App\Http\Controllers\CustomerController;
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
Route::prefix('cities')->group(function (){

    Route::get('/index',[CityController::class,'index'])->name('cities.index');
    Route::get('/create',[CityController::class,'create'])->name('cities.create');
    Route::post('/create',[CityController::class,'store'])->name('cities.store');
    Route::get('{id}/create',[CityController::class,'edit'])->name('cities.edit');
    Route::post('{id}/create',[CityController::class,'update'])->name('cities.update');
    Route::get('{id}/destroy',[CityController::class,'destroy'])->name('cities.destroy');



});


Route::prefix('customers')->group(function (){

    Route::get('/index',[CustomerController::class,'index'])->name('customers.index');
    Route::get('/create',[CustomerController::class,'create'])->name('customers.create');
    Route::post('/create',[CustomerController::class,'store'])->name('customers.store');
    Route::get('{id}/create',[CustomerController::class,'edit'])->name('customers.edit');
    Route::post('{id}/create',[CustomerController::class,'update'])->name('customers.update');
    Route::get('{id}/destroy',[CustomerController::class,'destroy'])->name('customers.destroy');

    Route::get('/filter', [CustomerController::class, 'filterByCity'])->name('customers.filterByCity');
    Route::get('/search', [CustomerController::class, 'search'])->name('customers.search');


});