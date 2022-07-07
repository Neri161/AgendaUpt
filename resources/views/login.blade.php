<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Iniciar Sesion</title>
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
                    <form action="{{route('login.form')}}" method="post">
                        {{csrf_field()}}
                        @if(isset($estatus))
                            @if($estatus == "success")
                                <label class="bg-success text-white col-md-12 text-center">{{$mensaje}}</label>
                            @elseif($estatus == "error")
                                <label class="bg-danger text-white col-md-12 text-center">{{$mensaje}}</label>
                            @endif
                        @endif
                        <div class="form-group">
                            <label for="correo">Correo:</label>
                            <div class="input-group flex-nowrap">
                                <span class="input-group-text" id="addon-wrapping"><i
                                        class="fas fa-user-friends"></i></span>
                                <input type="text" name="correo" id="correo" class="form-control"
                                       placeholder="Correo o Usuario"
                                       aria-label="correo" aria-describedby="addon-wrapping">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="password">Contraseña:</label>
                            <div class="input-group flex-nowrap">
                                <span class="input-group-text" id="addon-wrapping"><i class="fas fa-lock"></i></span>
                                <input type="password" name="pass" id="pass" class="form-control"
                                       placeholder="password" aria-label="password" aria-describedby="password">
                                <div class="input-group-append">
                                    <button id="show_password" class="btn btn-primary" type="button"
                                            onclick="mostrarPassword()"><span class="fa fa-eye-slash icon"></span>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="form-group text-right">
                            <a href="{{route('correo')}}" class="recuperar">
                                ¿Olvidaste tu contraseña?</a>
                        </div>


                        <div class="col-md-12 text-center ">
                            <button type="submit" id="btnIniciar" class="btn btn-block mybtn btn-primary tx-tfm">Iniciar
                                Sesión
                            </button>
                        </div>
                        <div class="form-group text-center">
                            No tienes cuenta <a href="{{route('registro')}}" class="recuperar">
                                Registrate aquí</a>
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
<script src="js/jquery.min.js"></script>
<script src="popper/popper.min.js"></script>
<!--    Plugin sweet Alert 2  -->
<script src="plugins/sweetAlert2/sweetalert2.all.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
<script src="https://cdn.jsdelivr.net/jquery.validation/1.15.1/jquery.validate.min.js"></script>
<script src="js/login.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="js/verificar.js"></script>
<script type="text/javascript">
    function mostrarPassword() {
        var cambio = document.getElementById("password");
        if (cambio.type == "password") {
            cambio.type = "text";
            $('.icon').removeClass('fa fa-eye-slash').addClass('fa fa-eye');
        } else {
            cambio.type = "password";
            $('.icon').removeClass('fa fa-eye').addClass('fa fa-eye-slash');
        }
    }
</script>
</body>
</html>
