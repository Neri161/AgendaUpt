@extends('usuario.layout.usuario')

@section('titulo')
    <title>Lista Usuarios</title>
@endsection
@section('CSS')
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="/dtjs/bootstrap/css/bootstrap.min.css">
    <!--datables CSS básico-->
    <link rel="stylesheet" type="text/css" href="/dtjs/datatables/datatables.min.css"/>
    <!--datables estilo bootstrap 4 CSS-->
    <link rel="stylesheet" type="text/css" href="/dtjs/datatables/DataTables-1.10.18/css/dataTables.bootstrap4.min.css">
@endsection
@section('contenido')
    <div class="row">
        <div class="col-lg-12">
            <div class="table-responsive">
                <table id="example" class="table table-striped table-bordered">
                    <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Apellido Paterno</th>
                        <th>Apellido Materno</th>
                        <th>Usuario</th>
                        <th>Correo</th>
                        <th>Rol</th>
                        <th>Gerencia</th>
                        <th>Accion</th>
                        <th>Gerencia</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($usuario as $usuarios)
                        <tr>
                            <td>{{$usuarios->nombre}}</td>
                            <td>{{$usuarios->paterno}}</td>
                            <td>{{$usuarios->materno}}</td>
                            <td>{{$usuarios->usuario}}</td>
                            <td>{{$usuarios->correo}}</td>
                            <td>{{$usuarios->rol_id}}</td>
                            <td>{{$usuarios->gerencia_id}}</td>
                            @if($usuarios->estatus == "activo")
                                <td>
                                    <button id="usuario" idUsuario="{{$usuarios->id}}" class="btn btn-success eliminar">
                                        <i class="fas fa-power-off"></i></button>
                                </td>
                            @else
                                <td>
                                    <button id="usuario" idUsuario="{{$usuarios->id}}" class="btn btn-danger activar">
                                        <i class="fas fa-power-off"></i></button>
                                </td>
                            @endif
                            <td>
                                <a href="{{route('editar.usuario')}}/{{$usuarios->id}}" class="btn btn-info editar">
                                    <i class="fas fa-pen"></i></a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <!-- datatables JS -->
    <script type="text/javascript" src="/js/jquery.min.js"></script>
    <script type="text/javascript" src="/dtjs/datatables/datatables.min.js"></script>
    <script type="text/javascript" src="/dtjs/main.js"></script>


    <script>
        $(document).ready(function () {
            $(".activar").click(function () {
                var id = $(this).attr('idUsuario');
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    type: "get",
                    url: "{{route('activarUsuario')}}/" + id,
                    dataType: 'json',
                    cache: false,
                    success: function (data) {
                        if (data.estatus == "success") {
                            location.reload();
                        } else {
                            alert(data.mensaje);
                        }
                    }
                });
            });
            $(".eliminar").click(function () {
                var id = $(this).attr('idUsuario');
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    type: "get",
                    url: "{{route('eliminarUsuario')}}/" + id,
                    dataType: 'json',
                    cache: false,
                    success: function (data) {
                        if (data.estatus == "success") {
                            location.reload();
                        } else {
                            alert(data.mensaje);
                        }
                    }
                });
            });
        });
    </script>
@endsection
