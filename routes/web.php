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

Route::get('/pagina',[HomeController::class, 'index'])->name("pagina.index");

Route::get('/pagina/create',[HomeController::class, 'nuevapagina'])->name("pagina.create");


Route::post('/pagina',[HomeController::class,'guardarpagina'])->name('pagina.nueva');


Route::get('/pagina/edit/{id}',[HomeController::class,'edit'])->name('pagina.edit');
Route::put('/pagina/actualizar/{pagina}',[HomeController::class,'updatepaginaform'])->name('pagina.actualizar');

Route::get('/index',function(){
    $datos["nombre"]="Alejandro Góngora Escalante";
    $datos["fecha"]="2026-12-15";
    $datos["actividad"]="Desarrollo de Software";
    $datos["descripcion_about"]="Empresa dedicada al desarollo de software a la medida de sus clientes";
    $datos["texto_ejemplo"]="Aquí va la descripción del texto de ejemplo";
    return view('index',$datos);
});

Route::get('/pagina/{id}',[HomeController::class, 'detalle'])->name('pagina.detalle');

Route::delete('/pagina/delete/{id}',[HomeController::class,'eliminar'])->name("pagina.delete");

//Definimos el método a utilizar
Route::get('nuevoregistro', function(){
    $pagina=new Pagina;
    $pagina->name='CARLOS';
    $pagina->email='maria4@gmail.com';
    $pagina->email_verified_at=date('Y-m-d');
    $pagina->password='123456';
    $pagina->avatar='user.png';
    $pagina->telefono='999999';
    $pagina->calle='89';
    $pagina->save();
    return $pagina;
});

//Definimos el método para buscar por el id
// Para obtener unicamente un registro
Route::get('buscarpaginaid',function(){
    $post=Pagina::find(5);
    return $post;
});

//Definimo el método para buscar por un campo determinado
Route::get('buscarxname',function(){
    $post=Pagina::where('name','carlos')->first();
    return $post;
});

//Para recuperar más de un registro
Route::get('obtenertodos',function(){
    $post=Pagina::all();
    return $post;
});

//Definimos el método para cambiar un registro
Route::get('updatename',function(){
    $post=Pagina::where('name','María')->first();
    $post->email='agongoraescalante125@gmail.com';
    $post->save();
    return $post;
});

//Definimos un método para obtener una lista conforme a un criterio determinado
// Para obtener más de un registro
Route::get('filter',function(){
    //$post=Pagina::where('calle','like','%123%')->get();
    $post=Pagina::where('calle','like','%123%')->orderBy("id","desc")->get();
    return $post;
});
 
// Para especificar unicamente los campos que quiera
Route::get('trescampos',function(){
    $post=Pagina::select('name','email','telefono')->get();
    return $post;
});

// Conforme a una selección solamente traerme un cierto número de registros
Route::get('filtroxnumreg',function(){
    $post=Pagina::select("name","email")->orderBy("name")->take(3)->get();
    return $post;
});

//Para eliminar un determinado registro
Route::get('eliminar_registro',function(){
    $post=Pagina::find(5);
    $post->delete();
    return "Eliminado";
});

//Obtener la fecha conforme a un formato
Route::get('Obtenerfechaformato',function(){
    $post=Pagina::select("name","email","created_at")->find(3);
    return $post;
});

//Obtener el valor de is_active
Route::get('Obtenerestatus',function(){
    $post=Pagina::find(3);
    // dd función de depuración que muestra el contenido de una variable
    dd($post->is_active);
    //return $post;
});

// El siguiente método se debe de llamar mediante un método de tipo request (por ejemplo, utilizando AJAX o Postman)
Route::put('/actualizar-dato/{id}',[HomeController::class,'update'])->name('dato.update');

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
