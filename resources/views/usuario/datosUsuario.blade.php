@extends('usuario.layout.usuario')

@section('titulo')
    <title>Perfil De Usuario</title>
@endsection

@section('CSS')
    <style>
        .fondo {
            background: linear-gradient(to bottom,#0093E9,#80D0C7);
            padding: 10px;
        }
        .perfil{
            padding: 10px;
        }
    </style>
@endsection

@section('contenido')

    <div class="container-fluid border perfil">
        <div class="row fondo">
            <img class="img-fluid rounded-circle img-thumbnail mx-auto d-block" src="{{session('usuario')->foto}}"
                 width="150">
        </div>
        <h3 class="text-center">{{session('usuario')->nombre}} {{session('usuario')->paterno}} {{session('usuario')->materno}}</h3>
        <dvi class="row col-md-12" style="margin-bottom: 3px;">
            Nombre: {{session('usuario')->nombre}} {{session('usuario')->paterno}} {{session('usuario')->materno}}
            <br>
            Usuario: {{session('usuario')->usuario}}
            <br>
            Correo: {{session('usuario')->correo}}
            <br>

        </dvi>
        <a href="{{route('usuario.editarusuario')}}" class="btn btn-primary btn-lg btn-block"> Editar perfil </a>
    </div>


@endsection

@section('js')


@endsection
