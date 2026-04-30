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
  <a href="{{route('pagina.index')}}">Volver a la página anterior</a>
  <h1>{{ $paginas->id }} : {{ $paginas->name }} </h1>
  <h3>Email: {{ $paginas->email }} </h3>
  <p>{{ $paginas->calle }}</p>
  <a href="{{route('pagina.edit',$paginas->id)}}">Editar</a>
  <form action="{{route('pagina.delete',$paginas->id)}}" method="POST">
    @csrf
    @method('DELETE')
    <button type="submit" class='btn btn-danger'>Eliminar página</button>
  </form>
@endsection
@section("Autor")
    {{$nombre}}
@endsection
@section("actividad",$actividad)
@section("texto_ejemplo")
    {{$texto_ejemplo}}
@endsection
@section("titulo_modal","Detalle usuario")