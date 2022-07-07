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
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!------ Include the above in your HEAD tag ---------->
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.15.1/jquery.validate.min.js"></script>
    <script src="js/login.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Kaushan+Script" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"
          integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
</head>
<body>
<div class="container box box_login shadow">
    <div class="row">
        <div class="col-md-5 mx-auto">
            <div id="first">
                <div class="myform form ">
                    <div class="logo mb-3">
                        <div class="col-md-12 text-center">
                            <h1 class="titulo">Recuperar Contraseña</h1>
                        </div>
                    </div>
                    <form action="{{route('cambio')}}" method="post">
                        {{csrf_field()}}
                        @if(isset($estatus))
                            @if($estatus == "success")
                                <label class="bg-success text-white col-md-12 text-center">{{$mensaje}}</label>
                            @elseif($estatus == "error")
                                <label class="bg-danger text-white col-md-12 text-center">{{$mensaje}}</label>
                            @endif
                        @endif
                        <div class="form-group">
                            <label for="correo">Contraseña Nueva:</label>
                            <div class="input-group flex-nowrap">
                                <span class="input-group-text" id="addon-wrapping"><i
                                        class="fas fa-lock-open"></i></span>
                                <input type="password" name="pass1" id="pass1" class="form-control"
                                       placeholder="Ingresa Nueva Contraseña"
                                       aria-label="correo" aria-describedby="addon-wrapping">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="correo">Confirmar Contraseña:</label>
                            <div class="input-group flex-nowrap">
                                <span class="input-group-text" id="addon-wrapping"><i
                                        class="fas fa-lock-open"></i></span>
                                <input type="password" name="pass2" id="pass2" class="form-control"
                                       placeholder="Confiramar Contraseña"
                                       aria-label="correo" aria-describedby="addon-wrapping">
                            </div>
                        </div>
                        <input type="hidden" name="codigo" value="{{$codigo}}">
                        <div class="col-md-12 text-center ">
                            <button type="submit" class=" btn btn-block mybtn btn-primary tx-tfm">Cambiar
                            </button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
