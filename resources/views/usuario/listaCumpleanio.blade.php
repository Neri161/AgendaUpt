@extends('usuario.layout.usuario')

@section('titulo')
    <title>Inicio</title>
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
                        <th>Fecha</th>
                        <th>Mensaje</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($cumple as $cumples)
                        <tr>
                            <td>{{$cumples->nombre}}</td>
                            <td>{{$cumples->fecha}}</td>
                            <td>{{$cumples->Mensaje}}</td>
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
    <script type="text/javascript" src="/dtjs/datatables/datatables.min.js"></script>
    <script type="text/javascript" src="/dtjs/main.js"></script>
@endsection
