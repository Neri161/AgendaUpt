<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Registro</title>
    <link rel="stylesheet" href="css/login.css">
    <link href="/img/e-learning-icon.ico" rel="icon">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="https://kit.fontawesome.com/7c0f4c4dd5.js" crossorigin="anonymous"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!------ Include the above in your HEAD tag ---------->
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.15.1/jquery.validate.min.js"></script>
    <script src="js/login.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Kaushan+Script" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"
          integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>
<div class="container box box_login shadow">
    <div class="row">
        <div class="col-md-5 mx-auto">
            <div id="first">
                <div class="myform form ">
                    <div class="logo mb-3">
                        <div class="col-md-12 text-center">
                            <h1 class="titulo">Inicio De Sesión</h1>
                        </div>
                    </div>
                    <form action="{{route('registro.form')}}" method="post">
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
                        <div class="form-group">
                            <label for="nombre">Nombre:</label>
                            <div class="input-group flex-nowrap">
                                <span class="input-group-text" id="addon-wrapping"><i
                                        class="fas fa-user-friends"></i></span>
                                <input type="text" name="nombre" id="nombre" class="form-control" placeholder="Nombre"
                                       aria-label="nombre" aria-describedby="addon-wrapping">
                            </div>
                            <div class="form-group">
                                <label for="correo">Apelldo Paterno:</label>
                                <div class="input-group flex-nowrap">
                                    <span class="input-group-text" id="addon-wrapping"><i
                                            class="fas fa-user-friends"></i></span>
                                    <input type="text" name="paterno" id="paterno" class="form-control"
                                           placeholder="Apelldo Paterno"
                                           aria-label="paterno" aria-describedby="addon-wrapping">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="materno">Apelldo Materno:</label>
                                <div class="input-group flex-nowrap">
                                    <span class="input-group-text" id="addon-wrapping"><i
                                            class="fas fa-user-friends"></i></span>
                                    <input type="text" name="materno" id="materno" class="form-control"
                                           placeholder="Apelldo Materno"
                                           aria-label="paterno" aria-describedby="addon-wrapping">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="nacimiento">Fecha de Nacimiento:</label>
                                <div class="input-group flex-nowrap">
                                    <span class="input-group-text" id="addon-wrapping"><i
                                            class="fas fa-user-friends"></i></span>
                                    <input type="date" name="nacimiento" id="nacimiento" class="form-control"
                                           aria-label="paterno" aria-describedby="addon-wrapping">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="telefono">Telefono:</label>
                                <div class="input-group flex-nowrap">
                                    <span class="input-group-text" id="addon-wrapping"><i
                                            class="fas fa-user-friends"></i></span>
                                    <input type="number" name="telefono" id="telefono" class="form-control"
                                           placeholder="Telefono"
                                           aria-label="telefono" aria-describedby="addon-wrapping">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="correo">Correo:</label>
                                <div class="input-group flex-nowrap">
                                <span class="input-group-text" id="addon-wrapping">
                                    <i class="fas fa-at"></i></span>
                                    <input
                                        type="email" name="correo" id="correo" class="form-control"
                                        placeholder="Correo"
                                        aria-label="correo" aria-describedby="addon-wrapping">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="pass">Contraseña:</label>
                                <div class="input-group flex-nowrap">
                                    <span class="input-group-text" id="addon-wrapping"><i
                                            class="fas fa-lock"></i></span>
                                    <input type="password" name="pass" id="pass" class="form-control"
                                           placeholder="Contraseña" aria-label="pass" aria-describedby="pass">
                                    <div class="input-group-append">
                                        <button id="show_password" class="btn btn-primary" type="button"
                                                onclick="mostrarPassword()"><span class="fa fa-eye-slash icon"></span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="pass2">Confirma Contraseña:</label>
                                <div class="input-group flex-nowrap">
                                    <span class="input-group-text" id="addon-wrapping"><i
                                            class="fas fa-lock"></i></span>
                                    <input type="password" name="pass2" id="pass2" class="form-control"
                                           placeholder="Confirma tu contraseña" aria-label="pass" aria-describedby="password">
                                    <div class="input-group-append">
                                        <button id="show_password" class="btn btn-primary" type="button"
                                                onclick="mostrarPassword2()"><span class="fa fa-eye-slash icon2"></span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 text-center ">
                                <button type="submit" id="btnIniciar" class="btn btn-block mybtn btn-primary tx-tfm">
                                    Registrar
                                </button>
                            </div>
                            <div class="form-group text-center">
                                ¿Tienes una cuenta? <a href="{{route('login')}}" class="recuperar">
                                    Inicia Sesion</a>
                            </div>
                            @if(isset($_GET["r"]))
                                <input type="hidden" name="url" value="{{$_GET["r"]}}">
                        @endif
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="public/js/jquery.min.js"></script>
<script src="public/popper/popper.min.js"></script>
<!--    Plugin sweet Alert 2  -->
<script src="public/plugins/sweetAlert2/sweetalert2.all.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
<script src="https://cdn.jsdelivr.net/jquery.validation/1.15.1/jquery.validate.min.js"></script>
<script src="public/js/login.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="public/js/verificar.js"></script>
<script type="text/javascript">
    function mostrarPassword() {
        var cambio = document.getElementById("pass");
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
            $('.icon2').removeClass('fa fa-eye-slash').addClass('fa fa-eye');
        } else {
            cambio.type = "password";
            $('.icon2').removeClass('fa fa-eye').addClass('fa fa-eye-slash');
        }
    }
</script>
</body>
</html>
