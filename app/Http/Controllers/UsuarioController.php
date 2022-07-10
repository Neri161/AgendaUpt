<?php

namespace App\Http\Controllers;

use App\Mail\RecuperarMailable;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\Usuario;
use App\Models\Agenda;
use App\Models\Grupo;


class UsuarioController extends Controller
{
    public function __construct() {
        if(!Session::has('usuario'))
            return redirect()->route('usuario.inicio');
    }
    public function login()
    {
        return view('login');
    }

    public function registro()
    {
        return view('registro');
    }
    public function registroContacto()
    {
        $grupo = Grupo::all();
        return view('usuario.registrarContacto',["grupo"=>$grupo]);
    }
    public function registroCumpleanio($id)
    {
        $contacto = Agenda::where('usuario_id',$id)->get();
        return view('usuario.registrarCumpleanio',['contacto'=>$contacto]);
    }
    public function registroCita()
    {
        return view('usuario.registrarCita');
    }
    public function recuperar()
    {
        return view('recuperar');
    }
    public function listaContacto($id)
    {
        $contacto = Agenda::where('usuario_id',$id)->get();
        return view('usuario.listaContacto',["contacto"=>$contacto]);
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
    public function cerrarSesion()
    {
        if (Session::has('usuario'))
            Session::forget('usuario');

        return redirect()->route('login');
    }
    public function recuperarContrasenia(Request $datos)
    {
        if (!$datos->correo)
            return view("recuperar", ["estatus" => "error", "mensaje" => "¡Completa los campos!"]);
        $usuario = Usuario::where('correo', $datos->correo)->first();
        if (!$usuario)
            return view("recuperar", ["estatus" => "error", "mensaje" => "¡El correo no esta registrado!"]);
        $max_num = 6;
        $codigo = "";
        for ($x = 0; $x < $max_num; $x++) {
            $num_aleatorio = rand(0, 9);
            $codigo = $codigo . strval($num_aleatorio);
        }
        $usuario->token_recovery = $codigo;
        $usuario->save();
        Mail::to($usuario->correo)->send(new RecuperarMailable($usuario));
        return view('codigo');
    }
    public function codigo(Request $datos)
    {
        if (!$datos->codigo)
            return view("codigo", ["estatus" => "error", "mensaje" => "¡El ingresa el codigo!"]);

        $usuario = Usuario::where('token_recovery', $datos->codigo)->first();

        if (!$usuario)
            return view("codigo", ["estatus" => "error", "mensaje" => "¡Error en el codigo!"]);

        return view("contrasenia", ["codigo" => $datos->codigo]);
    }

    public function cambio(Request $datos)
    {
        if (!$datos->pass1 || !$datos->pass2)
            return view("contrasenia", ["estatus" => "error", "mensaje" => "¡Completa los campos!"]);

        if ($datos->pass1 != $datos->pass2)
            return view("contrasenia", ["estatus" => "error", "mensaje" => "¡Las contraseñas no son iguales!"]);

        $usuario = Usuario::where('token_recovery', $datos->codigo)->first();
        $usuario->pass = password_hash($datos->pass1, PASSWORD_DEFAULT, ['cost' => 5]);
        $usuario->token_recovery = null;
        $usuario->save();

        return redirect()->route('login');
    }

}
