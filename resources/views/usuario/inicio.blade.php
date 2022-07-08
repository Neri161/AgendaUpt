@extends('usuario.layout.usuario')

@section('titulo')
    <title>Inicio</title>
@endsection

@section('css')

@endsection

@section('contenido')
    <h1 class="text-center"> Bienvenido {{session('usuario')->nombre}} </h1>
    <center><img src="https://c.tenor.com/xEd-AhmKlZcAAAAS/hi-hello.gif" width="500px" class="img-fluid" alt=""></center>
@endsection

@section('js')

@endsection
