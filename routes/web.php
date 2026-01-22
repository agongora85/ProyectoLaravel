<?php

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

Route::get('/', function () {
    return view('welcome');
})->name('vista_inicio');

Route::get('/contact',function(){
    $nombre="Alejandro Góngora Escalante";
    return view('contact',['nombre'=>$nombre,'carrera'=>'Doctor en Sistemas Computacionales']);
})->name('contact');

Route::get('/principal',function(){
    $datos=["titulo"=>"Tienda Virtual - Vista Principal","mensaje"=>"Bienvenido a la vista principal"];
    return view('principal',$datos);
})->name('principal');

Route::get('/empresa',[HomeController::class,'empresa'])->name('empresa');


