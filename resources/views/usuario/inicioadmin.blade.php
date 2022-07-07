@extends('usuario.layout.usuario')

@section('titulo')
    <title>Inicio</title>
@endsection

@section('css')

@endsection

@section('contenido')
    <h1 class="text-center"> Bienvenido {{session('usuario')->nombre}} </h1>
@endsection

@section('js')

@endsection
