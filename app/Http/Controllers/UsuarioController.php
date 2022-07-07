<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\Usuario;


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
                return redirect()->route('usuario.inicio');
        }
        return redirect()->route($this->bienvenida());
    }
    public function inicio(){
        return view('usuario.inicio');
    }

    public function registrar(Request $datos)
    {
        $validar  = $datos->validate( [
            'nombre' => "required|min:3|max:32|alpha",
            'paterno' => "required|min:3|max:32|alpha",
            'materno' => "required|min:3|max:32|alpha",
            'telefono' => "required|numeric",
            'correo' => "required|email|min:8|max:64",
            'nacimiento' => "required|date",
            'pass' => "required|min:8|max:64",
            'pass2' => "required|min:8|max:64"
        ]);

        $usuario = Usuario::where("correo", $datos->correo)->first();
        if ($usuario)
            return view("registro", ["estatus" => "error", "mensaje" => "¡El usuario existe!"]);

        $usuario = Usuario::where('correo', $datos->correo)->first();

        if ($usuario)
            return view("registro", ["estatus" => "error", "mensaje" => "¡El correo ya se encuentra registrado!"]);

        if ($datos->pass != $datos->pass2)
            return view("registro", ["estatus" => "error", "mensaje" => "¡Las contraseñas no son iguales!"]);

        $usuario = new Usuario();
        $usuario->nombre = $datos->nombre;
        $usuario->paterno = $datos->paterno;
        $usuario->materno = $datos->materno;
        $usuario->correo = $datos->correo;
        $usuario->pass = password_hash($datos->pass, PASSWORD_DEFAULT, ['cost' => 5]);
        $usuario->nacimiento = $datos->nacimiento;
        $usuario->telefono = $datos->telefono;
        $usuario->save();
        return view("login", ["estatus" => "success", "mensaje" => "¡Cuenta Creada!"]);
    }
}
