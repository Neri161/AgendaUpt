@extends('usuario.layout.usuario')

@section('titulo')
    <title>Curso | {{$primero->Titulo}}</title>
@endsection

@section('CSS')
<style>
    .estilo{
        font-size: 16px;
    }
</style>
@endsection

@section('contenido')
    <div class="container-fluid">
        <section>
            <div class="text-center">
                <h2>Cusro : {{$primero->Titulo}}</h2>
            </div>
            <div class="embed-responsive embed-responsive-16by9">
                <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/{{$primero->url}}"
                        allowfullscreen></iframe>

            </div>
            <br>
            <div class="text-justify texto">
                <p>Descripción Del Curso:</p>
                {{$primero->descripcion}}
            </div>
            <br>
            <div class=" texto">
                <p>Matrial de Apoyo: </p>
            </div>
        </section>
    </div>


@endsection

@section('js')


@endsection
