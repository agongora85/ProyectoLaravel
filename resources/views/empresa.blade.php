@extends('layouts.app')
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
@section('titulo1')
    <h1>About Me</h1>
@endsection
@section("Autor")
    {{$nombre}}
@endsection
@section("actividad",$actividad)