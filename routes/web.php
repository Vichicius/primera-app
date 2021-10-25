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


Route::get('hola', function () {
    return view('welcome');
});

Route::get('fecha', function () {
    return view('fecha');
});

Route::match(['get','post'],'edad', function () {
    return view('edad');
});

Route::match(['get','post'],'cumple', function () {
    return view('cumple');
});

Route::redirect('/', 'hola');