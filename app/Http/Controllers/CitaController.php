<?php

namespace App\Http\Controllers;

use App\Mail\CitaMail;
use App\Models\Cita;
use App\Models\Cumpleanios;
use Illuminate\Http\Request;
use App\Mail\RecuperarMailable;
use Illuminate\Support\Facades\Mail;

class CitaController extends Controller
{
    public function registrar(Request $data)
    {
        $validar = $data->validate([
            'nombre' => 'required',
            'fecha' => 'required|date',
            'correo' => 'required|email|min:8|max:64',
            'mensaje' => 'required',
            'id' => 'required'
        ]);
        $cita = new Cita();
        $cita->nombre = $data->nombre;
        $cita->fecha= $data->fecha;
        $cita->hora= $data->mensaje;
        $cita->usuario_id= $data->id;
        $cita->save();
        Mail::to($data->correo)->send(new CitaMail($cita));
        return redirect()->route('usuario.inicio');
    }
}
