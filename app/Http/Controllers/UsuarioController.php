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
        if (!$datos->correo || !$datos->password)
            return view("login", ["estatus" => "error", "mensaje" => "¡Completa los campos!"]);

        $usuario = Usuario::where('correo', $datos->correo)->orwhere('usuario',$datos->correo)->first();

        if (!$usuario)
            return view("login", ["estatus" => "error", "mensaje" => "¡El correo no esta registrado!"]);


        if (!password_verify($datos->password, $usuario->pass))
            return view("login", ["estatus" => "error", "mensaje" => "¡La contraseña que ingresaste es incorrecta!"]);

        Session::put('usuario', $usuario);

        if (isset($datos->url)) {
            $url = decrypt($datos->url);
            return redirect($url);
        } else {
            if($usuario->rol_id == 1)
                return redirect()->route('admin.inicio');
            if($usuario->rol_id == 2)
                return redirect()->route('usuario.inicio');
        }
        return redirect()->route($this->bienvenida());
    }
}
