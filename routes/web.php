<?php

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/books','App\Http\Controllers\Books_Controller@index');
Route::get('/books/add','App\Http\Controllers\Books_Controller@create');
Route::post('/books/add','App\Http\Controllers\Books_Controller@store');
Route::get('/books/edit/{id}','App\Http\Controllers\Books_Controller@edit');
Route::put('/books/edit/{id}','App\Http\Controllers\Books_Controller@update');
Route::delete('/books/delete/{id}','App\Http\Controllers\Books_Controller@destroy');

