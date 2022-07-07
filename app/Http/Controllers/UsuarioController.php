<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UsuarioController extends Controller
{

    public function login()
    {
        return view('login');
    }

    public function registro()
    {
        return view('registro');
    }

    public function recuperar()
    {
        return view('recuperar');
    }

    public function verificarCredenciales(Request $datos)
    {
        if (!$datos->correo || !$datos->pass)
            return view("login", ["estatus" => "error", "mensaje" => "¡Completa los campos!"]);

        $usuario = Usuario::where('correo', $datos->correo)->first();

        if (!$usuario)
            return view("login", ["estatus" => "error", "mensaje" => "¡El correo no esta registrado!"]);


        if (!password_verify($datos->pass, $usuario->pass))
            return view("login", ["estatus" => "error", "mensaje" => "¡La contraseña que ingresaste es incorrecta!"]);

        Session::put('usuario', $usuario);

        if (isset($datos->url)) {
            $url = decrypt($datos->url);
            return redirect($url);
        } else {
            if ($usuario->rol_id == 1)
                return redirect()->route('admin.inicio');
            if ($usuario->rol_id == 2)
                return redirect()->route('usuario.inicio');
        }
        return redirect()->route($this->bienvenida());
    }

    public function registrar(Request $datos)
    {
        $rules = [
            'nombre' => "required|min:3|max:32|alpha",
            'paterno' => "required|min:3|max:32|alpha",
            'materno' => "required|min:3|max:32|alpha",
            'telefono' => "required|min:10|max:14|alpha",
            'correo' => "required|email|min:8|max:64",
            'nacimiento' => "required|date",
            'pass' => "required|min:8|max:64",
            'pass2' => "required|min:8|max:64"
        ];
        $validator = Validator::make($datos->all(), $rules);

        if ($validator->fails())
            return $validator->errors();

        $usuario = Usuario::where("correo", $datos->correo)->first();
        if ($usuario)
            return view("registro", ["estatus" => "error", "mensaje" => "¡El usuario existe!", "rol" => $roles, "gerencia" => $gerencias]);

        $usuario = Usuario::where('correo', $datos->correo)->first();

        if ($usuario)
            return view("registro", ["estatus" => "error", "mensaje" => "¡El correo ya se encuentra registrado!", "rol" => $roles, "gerencia" => $gerencias]);

        if ($datos->pass1 != $datos->pass2)
            return view("registro", ["estatus" => "error", "mensaje" => "¡Las contraseñas no son iguales!", "rol" => $roles, "gerencia" => $gerencias]);

        $usuario = new Usuario();
        $usuario->nombre = $datos->nombre;
        $usuario->paterno = $datos->paterno;
        $usuario->materno = $datos->materno;
        $usuario->correo = $datos->correo;
        $usuario->password = password_hash($datos->pass1, PASSWORD_DEFAULT, ['cost' => 5]);
        $usuario->rol_id = $datos->rol;
        $usuario->gerencia_id = $datos->gerencia;
        $usuario->estatus = "activo";
        $usuario->foto = "/img/undraw_profile.svg";
        $usuario->save();
        return view("admin.registrarUsuario", ["estatus" => "success", "mensaje" => "¡Cuenta Creada!", "rol" => $roles, "gerencia" => $gerencias]);
    }
}
