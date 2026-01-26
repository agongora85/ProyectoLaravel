<?php

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Models\Pagina;

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

Route::get('prueba',function(){
    //return 'Hola desde la ruta de prueba';
    /**
     * La siguientes lineas me sirve para crear un nuevo registro en la tabla paginas
     * 
     * $pagina=new Pagina;
     * $pagina->name="Juan Pérez";
     * $pagina->email="jperez1@gmail.com";
     * $pagina->password='12345678';
     * $pagina->avatar='avatar1.png';
     * $pagina->telefono='555-1234';
     * $pagina->calle='Calle Falsa 123';
     * $pagina->save();
     * return $pagina;
     */
    /*
    Método de búsqueda por id
    $pagina=Pagina::find(1);
    return $pagina;
    */

    // Método de busqueda por otro tipo de campo
    // $pagina=Pagina::where('email','jperez@gmail.com')->first();
    // return $pagina;

    //Si quisiera modificar algún registro
    // $pagina=Pagina::where('email','jperez@gmail.com')->first();
    // $pagina->email="juan_perez@gmail.com";
    // $pagina->save();
    // return $pagina; 

    // Para traer todos los registros de la tabla paginas
    // $pagina=Pagina::all();
    // return $pagina;

    //Para traer todos los registros que cumplan una determinada condición
    /*
    $pagina=Pagina::where('name','like','%Pérez%')->orderBy('id','asc')->get();
    return $pagina;
    */

    //Para traer solamente algunos campos de la consulta
    $pagina=Pagina::select('id','name','email')->get();
    return $pagina;
});
