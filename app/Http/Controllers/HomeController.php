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
        //$pagina=Pagina::orderBy('id','desc')->get();
       $pagina=Pagina::orderBy('id','desc')->paginate(10); 
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

    public function edit($id){
        $pagina=Pagina::find($id);
        $datos["paginas"]=$pagina;
        $datos["nombre"]="Alejandro Góngora Escalante";
        $datos["fecha"]="2026-12-15";
        $datos["actividad"]="Desarrollo de Software";
        $datos["descripcion_about"]="Empresa dedicada al desarollo de software a la medida de sus clientes";
        $datos["texto_ejemplo"]="Aquí va la descripción del texto de ejemplo";
        return view('edit',$datos);
    }

    public function updatepaginaform(Request $request, $id){
        $pagina=Pagina::find($id);
        $pagina->name=$request->name;
        $pagina->email=$request->email;
        $pagina->telefono=$request->telefono;
        $pagina->calle=$request->calle;
        $pagina->save();

        $datos['id']=$id;
        $datos["nombre"]="Alejandro Góngora Escalante";
        $datos["fecha"]="2026-12-15";
        $datos["actividad"]="Desarrollo de Software";
        $datos["descripcion_about"]="Empresa dedicada al desarollo de software a la medida de sus clientes";
        $datos["texto_ejemplo"]="Aquí va la descripción del texto de ejemplo";
        $datos['paginas']=$pagina;
        //return "Aquí se actualizará la página: {$pagina}";
        return view('detalle',$datos);
    }

    public function detalle(Pagina $id){
        // Retorno todo el contenido de la tabla de paginas
        //$pagina=Pagina::find($id);
        //$datos['id']=$id;
        $datos["nombre"]="Alejandro Góngora Escalante";
        $datos["fecha"]="2026-12-15";
        $datos["actividad"]="Desarrollo de Software";
        $datos["descripcion_about"]="Empresa dedicada al desarollo de software a la medida de sus clientes";
        $datos["texto_ejemplo"]="Aquí va la descripción del texto de ejemplo";
        $datos['paginas']=$id;
        //return $datos;
        //Tomo el nombre de la variable como referencia para mostrar la vista
        return view('detalle',$datos);
    }
    /*public function guardarpagina(){
        //return "Procesar el formulario";
        return request()->all();
    }*/

    public function guardarpagina(Request $request){
        $pagina=new Pagina();
        $pagina->name=$request->name;
        $pagina->email=$request->email;
        $pagina->telefono=$request->telefono;
        $pagina->calle=$request->calle;
        $pagina->password=bcrypt('123456');
        $pagina->save();
        return redirect('/pagina');
        //return $request->all();
    }

    public function nuevapagina(){
        $datos["nombre"]="Alejandro Góngora Escalante";
        $datos["fecha"]="2026-12-15";
        $datos["actividad"]="Desarrollo de Software";
        $datos["descripcion_about"]="Empresa dedicada al desarollo de software a la medida de sus clientes";
        $datos["texto_ejemplo"]="Aquí va la descripción del texto de ejemplo";
        $datos['texto']="Aquí se mostrara el formulario de nuevo";
        return view('frmnuevapagina',$datos);
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

    public function eliminar($id){
        //return "Eliminando la página";
        $pagina=Pagina::find($id);
        $pagina->delete();
        return redirect('/pagina');
    }
}
