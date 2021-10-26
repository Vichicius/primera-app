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
    $inputNacimiento = $request->input("nacimientoE");
    if($inputNacimiento != ""){

        $nacimiento = new DateTime($inputNacimiento);
        $actual = new DateTime($hoySTR);

        $diferencia = $nacimiento->diff($actual);
        $output = $diferencia->format("Tienes %y años, %m meses y %d días");

    }
    return view('edad',["output"=>$output, "hoy"=>$hoySTR]);
});

Route::match(['get','post'],'cumple', function (Request $request) {
    $hoySTR = date('Y-m-d');
    $output1 = "";
    $output2 = "";
    $inputCumple = $request->input("nacimientoC");
    if($inputCumple != ""){
        $nacimiento = new DateTime($inputCumple);
        $datos = explode("-",$inputCumple);
    
        $proxCumple = new DateTime(date("Y")."-".$datos[1]."-".$datos[2]);
        $hoyDT = new DateTime($hoySTR);
    
        //Si tu cumple se ha pasado este año, sumarle 1 año a tu prox cumple
        if($proxCumple < $hoyDT){
            $proxCumple->add(new DateInterval('P1Y'));
        }
        //Si es tu cumpleaños, hacer un echo
        if($proxCumple == $hoyDT){
            $output1 = "Es tu cumpleaños!!!";
        }
        else{
            $diferencia = $hoyDT->diff($proxCumple);
            $output1 = $diferencia->format("Quedan %m meses y %d días para tu cumple!");
            $output2 .= "Tu cumple caerá en un ".$proxCumple->format("l");
        }
    }
    return view('cumple', ["output1"=>$output1,"output2"=>$output2, "hoy"=>$hoySTR]);
});

Route::redirect('/', 'hola');