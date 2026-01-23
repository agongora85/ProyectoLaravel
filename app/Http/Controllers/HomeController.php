<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function empresa(){
        $datos=["nombre"=>"Alejandro Góngora Escalante","fecha"=>"2026-12-15","actividad"=>"Desarrollo de Software"];
        return view('empresa', $datos);
    }
}
