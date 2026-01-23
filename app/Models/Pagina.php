<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pagina extends Model
{
    public function ObtenerListado(){
        $listadousuarios=Pagina::table('users')->get();
        return $listadousuarios;
    }
}
