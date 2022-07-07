@extends('usuario.layout.usuario')

@section('titulo')
    <title>Editar Usuario</title>
@endsection

@section('CSS')

@endsection

@section('contenido')
    <!--  Formulario registrar usuario -->
    <form action="{{route('editar.form')}}" method="post" name="registration">
        {{csrf_field()}}
        @if(isset($estatus))
            @if($estatus == "success")
                <label class="bg-success text-white col-md-12 text-center">{{$mensaje}}</label>
            @elseif($estatus == "error")
                <label class="bg-danger text-white col-md-12 text-center">{{$mensaje}}</label>
            @endif
        @endif
        <div class="container-fluid" id="sticky-sidebar">
            <div class="col-md-9">
                <div class="header text-justify">
                    <h1>Editar Usuario</h1>
                </div>
            </div>
            <div class="inside">
                <div class="row">
                    <div class="col-md-6">
                        <label for="paterno">Apellido Paterno:</label>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1"><i class="fas fa-user"></i></span>
                            <input type="text" name="paterno" class="form-control"
                                   placeholder="Ingresa Apellido Paterno" id="paterno" value="{{$usuario->paterno}}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="materno" class="mtop16">Apellido Materno:</label>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1"><i class="fas fa-user"></i></span>
                            <input type="text" name="materno" class="form-control"
                                   placeholder="Ingresa Apellido Materno" id="materno" value="{{$usuario->materno}}">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <label for="nombre">Nombre:</label>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1"><i class="fas fa-user"></i></span>
                            <input type="text" id="nombre" name="nombre" class="form-control"
                                   placeholder="Ingresa Nombre"
                                   value="{{$usuario->nombre}}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="comprobarUsuario" class="mtop16">Usuario:</label>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1"><i class="fas fa-user"></i></span>
                            <input type="text" name="usuario" id="usuario" class="form-control"
                                   placeholder="Ingresa Usuario" value="{{$usuario->usuario}}">
                            <!--<span> id="estadoUsuario</span>-->
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <label for="nombre">Rol:</label>
                        <select class="browser-default custom-select" name="rol" id="rol">
                            @foreach($rol as $roles)
                                @if($roles->id == $usuario->rol_id)
                                <option selected="" value="{{$usuario->rol_id}}">Rol Actual {{$roles->rol}}</option>
                                @endif
                            @endforeach
                            @foreach($rol as $roles)
                                <option value="{{$roles->id}}">{{$roles->rol}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="nombre">Gerencia:</label>
                        <select class="browser-default custom-select" name="gerencia" id="gerencia">
                            @foreach($gerencia as $gerencias)
                                @if($gerencias->id == $usuario->gerencia_id)
                                    <option selected="" value="{{$usuario->gerencia_id}}">Gerencia Actual {{$gerencias->gerencia}}</option>
                                @endif
                            @endforeach
                            @foreach($gerencia as $gerencias)
                                <option value="{{$gerencias->id}}">{{$gerencias->gerencia}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <label for="correo" class="mtop16">Correo:</label>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">@</span>
                            <input type="email" id="correo" name="correo" class="form-control"
                                   placeholder="Ingresa Correo" value="{{$usuario->correo}}">
                        </div>
                    </div>
                </div>
                <input type="hidden" value="{{$usuario->id}}" name="id" id="idUsuario">
                <div class="row">
                    <div class="col-md-4 text-center ">
                    </div>
                    <div class="col-md-12 text-center ">
                        <button type="submit" id="btnRegistrar" class=" btn btn-block mybtn btn-primary tx-tfm">
                            Actualizar
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
    <script src="/js/jquery.min.js"></script>
    <script src="/popper/popper.min.js"></script>
    <!--    Plugin sweet Alert 2  -->
    <script src="/plugins/sweetAlert2/sweetalert2.all.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script>
        $("#usuario").on("keyup", function () {
            var texto = $("#usuario").val();

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: "get",
                url: "{{route('usuario.usuario')}}/" + texto,
                dataType: 'json',
                cache: false,
                success: function (data) {
                    if (data.estatus == "success") {
                        // alert(data.mensaje);
                        $("#usuario").css("border-color", "green")
                        $("#usuario").css("box-shadow", "1px 1px 1px 1px green")
                    } else {
                        // alert('hola?');
                        $("#usuario").css("border-color", "red")
                        $("#usuario").css("box-shadow", "1px 1px 1px 1px red")
                    }

                }
            });
        });
    </script>
    <script type="text/javascript">
        function mostrarPassword1() {
            var cambio = document.getElementById("pass1");
            if (cambio.type == "password") {
                cambio.type = "text";
                $('.icon').removeClass('fa fa-eye-slash').addClass('fa fa-eye');
            } else {
                cambio.type = "password";
                $('.icon').removeClass('fa fa-eye').addClass('fa fa-eye-slash');
            }
        }

        function mostrarPassword2() {
            var cambio = document.getElementById("pass2");
            if (cambio.type == "password") {
                cambio.type = "text";
                $('.icon').removeClass('fa fa-eye-slash').addClass('fa fa-eye');
            } else {
                cambio.type = "password";
                $('.icon').removeClass('fa fa-eye').addClass('fa fa-eye-slash');
            }
        }
    </script>
@endsection
