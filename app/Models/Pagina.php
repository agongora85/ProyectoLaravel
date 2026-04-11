<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pagina extends Model
{
    use HasFactory;
    
    // Se específica la tabla con la cual se pretende trabajar
    // Se recomienda que el modelo se escriba en singular y las tablas en plural
    protected $table='paginas';
    //Creamos un atributo mediante cast para el guardado y la obtención de los datos
    protected function casts():array{
        return [
            'created_at'=>'datetime:d-m-Y',
            'is_active'=>'boolean'
        ];
    }

    protected function name():Attribute{
        return Attribute::make(
            set: function($value){//Mutador
                return strtolower($value);
            },
            get:function($value){//Accesor
                return ucfirst($value);
            }
        );
    }

    public function ObtenerListado(){
        $listadousuarios=Pagina::all();
        return $listadousuarios;
    }

    public function BuscarId($id){
        $registro=Pagina::find($id);
        return $registro;
    }
}
