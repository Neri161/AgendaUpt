$(document).ready(function () {

    $("#btnRegistrar").click(function () {
        var nombre = $("#nombre").val();
        var paterno = $("#paterno").val();
        var materno = $("#materno").val();
        var usuario = $("#usuario").val();
        var correo = $("#correo").val();
        var pass1 = $("#pass1").val();
        var pass2 = $("#pass2").val();
        var mayus = new RegExp("^(?=.*[A-Z])");
        var lower = new RegExp("^(?=.*[a-z])");
        var len = new RegExp("^(?=.{6,})");

        if (nombre == "" || nombre == null) {
            Swal.fire({
                //error
                type: 'error',
                title: 'Error',
                text: '¡Ingresar el nombre!',
            });
            $("#nombre").focus();
            return false;
        }
        if (paterno == "" || paterno == null) {
            Swal.fire({
                //error
                type: 'error',
                title: 'Error',
                text: '¡Ingresar el apellido paterno!',
            });
            $("#paterno").focus();
            return false;
        }
        if (materno == "" || materno == null) {
            Swal.fire({
                //error
                type: 'error',
                title: 'Error',
                text: '¡Ingresar el apellido materno!',
            });
            $("#materno").focus();
            return false;
        }
        if (correo == "" || correo == null) {
            Swal.fire({
                //error
                type: 'error',
                title: 'Error',
                text: '¡Ingresar el Correo!',
            });
            $("#email").focus();
            return false;
        }
        if ((pass1 == "" || pass1 == null) || (pass2 == "" || pass2 == null)) {
            Swal.fire({
                //error
                type: 'error',
                title: 'Error',
                text: '¡Ingresar la Contraseña!',
            });
            $("#pass1").focus();
            return false;
        }
        if (pass1 != pass2) {
            Swal.fire({
                //error
                type: 'error',
                title: 'Error',
                text: '¡Las contraseñas no son iguales!',
            });
            $("#pass1").focus();
            return false;
        }
        if (!(mayus.test(pass1) && lower.test(pass1) && len.test(pass1))) {
            Swal.fire({
                //error
                type: 'error',
                title: 'Error',
                text: '¡Las contraseñas no son es Segura!',
            });
            $("#pass1").focus();
            return false;
        }
        if (usuario == "" || usuario==null){
            Swal.fire({
                //error
                type: 'error',
                title: 'Error',
                text: '¡Ingresar el Usuario!',
            });
            $("#usuario").focus();
            return false;
        }
    });
    $("#btnIniciar").click(function () {
        var correo = $("#correo").val();
        var pass = $("#pass").val();

        if (correo == "" || correo == null) {
            Swal.fire({
                //error
                type: 'error',
                title: 'Error',
                text: '¡Ingresar el Correo!',
            });
            $("#email").focus();
            return false;
        }
        if (pass1 == "" || pass1 == null) {
            Swal.fire({
                //error
                type: 'error',
                title: 'Error',
                text: '¡Ingresar la Contraseña!',
            });
            $("#pass1").focus();
            return false;
        }
    });

});


