@extends('layouts.base')
@section('titulopagina','Empresa E-Commerce')
@push('css')
    <style>
        .fondo {
            background: #302886;
        }

        .img-responsive{
            width: 100%;
            height: 100%;
        }
  </style>
@endpush

@section('titulo')
    Bienvenido a la página de EC
@endsection


@section('subtitulo')
    Explorando las oportunidades con Laravel 12
@endsection
@section('link1','Active')
@section("contenido_cuerpo")
  <div class="row">
    <div class="col-6">
        <form action="{{route('pagina.nueva')}}" method="post">
            <!-- Generación oculta del token -->
            @csrf
            <label for="name" class="form-label">Name</label>
            <input type="text" name="name" id="name" class="form-control">
            <label for='email' class="form-label">Correo</label>
            <input type='text' name='email' id='email' class="form-control">
            <label for='telefono' class="form-label">Teléfono</label>
            <input type='text' name='telefono' id='telefono' class="form-control">
            <label for='calle' class="form-label">Calle</label>
            <input type='text' name='calle' id='calle' class="form-control"><br>
            <button class='btn btn-primary'>Crea página</button>
        </form>
    </div>
  </div>
@endsection
@section("Autor")
    {{$nombre}}
@endsection
@section("actividad",$actividad)
@section("texto_ejemplo")
    
@endsection
@section("titulo_modal","Detalle usuario")

