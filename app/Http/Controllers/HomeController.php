<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pagina;
use Illuminate\Support\Facades\App;
use Yajra\DataTables\DataTables;

class HomeController extends Controller
{
    
    public function index(){
        // Retorno todo el contenido de la tabla de paginas
        $pagina=Pagina::all();
        $datos["nombre"]="Alejandro Góngora Escalante";
        $datos["fecha"]="2026-12-15";
        $datos["actividad"]="Desarrollo de Software";
        $datos["descripcion_about"]="Empresa dedicada al desarollo de software a la medida de sus clientes";
        $datos["texto_ejemplo"]="Aquí va la descripción del texto de ejemplo";
        $datos['paginas']=$pagina;
        //return $pagina;
        //Tomo el nombre de la variable como referencia para mostrar la vista
        return view('index',$datos);
    }

    public function empresa(){
        $datos["nombre"]="Alejandro Góngora Escalante";
        $datos["fecha"]="2026-12-15";
        $datos["actividad"]="Desarrollo de Software";
        $datos["descripcion_about"]="Empresa dedicada al desarollo de software a la medida de sus clientes";
        $datos["texto_ejemplo"]="Aquí va la descripción del texto de ejemplo";
        
        $usuarios=new Pagina();
        $datos["listadousuarios"]=$usuarios->ObtenerListado();
        return view('empresa', $datos);
    }

    public function update(Request $request){
        $usuarios=new Pagina();
        $respuesta=$usuarios->BuscarId($request->id);
        if(!empty($respuesta)){
            $respuesta->name=$request->name;
            $respuesta->calle=$request->calle;
            $respuesta->save();
        }
        return $respuesta;
    }
}
