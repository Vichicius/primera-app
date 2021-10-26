<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
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
    $DateAndTime = date('d/m/y h:i:s');
    return view('fecha', ["fecha" => $DateAndTime]);
});

Route::match(['get','post'],'edad', function (Request $request) {
    $hoySTR = date('Y-m-d');
    $output = "";
    $inputNacimiento = $request->input("nacimiento");
    if($inputNacimiento != ""){

        $nacimiento = new DateTime($inputNacimiento);
        $actual = new DateTime($hoySTR);

        $diferencia = $nacimiento->diff($actual);
        $output = $diferencia->format("Tienes %y años, %m meses y %d días");

    }
    return view('edad',["output"=>$output, "hoy"=>$hoySTR]);
});

Route::match(['get','post'],'cumple', function () {
    return view('cumple');
});

Route::redirect('/', 'hola');