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
  <ul>
    @foreach($paginas as $pagina)
        <li>
            {{ $pagina->name }}
        </li>
  @endforeach
  </ul>
@endsection
@section("Autor")
    {{$nombre}}
@endsection
@section("actividad",$actividad)
@section("texto_ejemplo")
    {{$texto_ejemplo}}
@endsection
@section("titulo_modal","Detalle usuario")