@extends('usuario.layout.usuario')

@section('titulo')
    <title>Registrar Contacto</title>
@endsection

@section('CSS')

@endsection

@section('contenido')
    <!--  Formulario registrar usuario -->
    <form action="{{route('rcontacto')}}" method="post" name="registration">
        {{csrf_field()}}
        @if(isset($estatus))
            @if($estatus == "success")
                <label class="bg-success text-white col-md-12 text-center">{{$mensaje}}</label>
            @elseif($estatus == "error")
                <label class="bg-danger text-white col-md-12 text-center">{{$mensaje}}</label>
            @endif
        @endif
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="container-fluid" id="sticky-sidebar">
            <div class="col-md-9">
                <div class="header text-justify">
                    <h1>Agregar Contacto</h1>
                </div>
            </div>
            <div class="inside">

                <div class="row">
                    <div class="col-md-6">
                        <label for="paterno">Apellido Paterno:</label>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1"><i class="fas fa-user"></i></span>
                            <input type="text" name="paterno" class="form-control"
                                   placeholder="Ingresa Apellido Paterno" id="paterno" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="materno" class="mtop16">Apellido Materno:</label>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1"><i class="fas fa-user"></i></span>
                            <input type="text" name="materno" class="form-control"
                                   placeholder="Ingresa Apellido Materno" id="materno" required>

                        </div>
                    </div>

                </div>
                <div class="row">

                    <div class="col-md-6">
                        <label for="nombre">Nombre:</label>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1"><i class="fas fa-user"></i></span>
                            <input type="text" id="nombre" name="nombre" class="form-control" placeholder="Ingresa Nombre" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="Direccion" class="mtop16">Direccion:</label>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1"><i class="fas fa-user"></i></span>
                            <input type="text" name="Direccion" id="Direccion" class="form-control"
                                   placeholder="Ingresa Direccion" required>
                            <!--<span> id="estadoUsuario</span>-->
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <label for="correo" class="mtop16">Correo:</label>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">@</span>
                            <input type="email" id="correo" name="correo" class="form-control" placeholder="Ingresa Correo" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="telefono" class="mtop16">Telefono:</label>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1"><i class="fas fa-mobile"></i></span>
                            <input type="number" id="telefono" name="telefono" class="form-control" placeholder="Ingresa Telefono" required>
                            <input type="hidden" id="id" name="id" value="{{session('usuario')->id}}">
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <label for="grupo">Grupo:</label>
                    <select class="browser-default custom-select" name="grupo" id="grupo">
                        <option selected="">Selecciona El Grupo</option>
                        @foreach($grupo as $grupos)
                            <option value="{{$grupos->id}}">{{$grupos->tipo}}</option>
                        @endforeach
                    </select>
                </div>
                <p></p>
                <div class="row">
                    <div class="col-md-4 text-center ">
                    </div>
                    <div class="col-md-12 text-center ">
                        <button type="submit" id="btnRegistrar" class=" btn btn-block mybtn btn-primary tx-tfm"> Registrar
                        </button>
                    </div>
                    <div class="col-md-3 text-center ">
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection

@section('js')
    <script src="public/js/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
@endsection
