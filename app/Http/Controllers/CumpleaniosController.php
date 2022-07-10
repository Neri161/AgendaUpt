<?php

namespace App\Http\Controllers;

use App\Models\Cumpleanios;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\Usuario;
use App\Models\Agenda;
use App\Models\Grupo;

class CumpleaniosController extends Controller
{
    public function registrar(Request $data)
    {
        $validar = $data->validate([
            'nombre' => 'required',
            'fecha' => 'required|date',
            'mensaje' => 'required',
            'id' => 'required'
        ]);
        $cumple = new Cumpleanios();
        $cumple->nombre = $data->nombre;
        $cumple->fecha= $data->fecha;
        $cumple->mensaje= $data->mensaje;
        $cumple->usuario_id= $data->id;
        $cumple->save();
        return redirect()->route('usuario.inicio');
    }
}
