@extends('usuario.layout.usuario')

@section('titulo')
    <title>Registrar Gerencias</title>
@endsection

@section('css')

@endsection

@section('contenido')
    <link rel="stylesheet" href="css/login.css">


    <!--  Formulario registrar usuario -->
    <form action="{{route('gerencia.form')}}" method="post" name="registration">
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
                    <h1>Agregar Gerencia</h1>
                </div>
            </div>
            <div class="inside">
                <div class="row">
                    <div class="col-md-12">
                        <label for="correo" class="mtop16">Gerencia:</label>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1"><i class="fas fa-tasks"></i></span>
                            <input type="text" name="gerencia" class="form-control" placeholder="Ingresa nombre de  Gerencia">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 text-center ">
                        <button type="submit" class=" btn btn-block mybtn btn-primary tx-tfm"> Registrar
                        </button>
                    </div>
                    <div class="col-md-3 text-center ">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3 ">
                        <label for="password2" class="mtop16"></label>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection

@section('js')
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
@endsection
