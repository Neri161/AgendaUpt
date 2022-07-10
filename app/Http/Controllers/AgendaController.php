<?php

namespace App\Http\Controllers;

use App\Models\Grupo;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\Agenda;

class AgendaController extends Controller
{
    public function registro(Request $data){
        $validar = $data->validate([
            'paterno'=>"required|min:3|max:32|alpha",
            'materno'=>"required|min:3|max:32|alpha",
            'nombre'=>"required|min:3|max:32|alpha",
            'Direccion'=>"required|min:3|max:32",
            'correo'=>"required|email|min:3|max:32",
            'telefono'=>"required|numeric",
            'id'=>"required",
            'grupo'=>"required"
        ]);
        $agenda = new Agenda();
        $agenda->nombre = $data->nombre;
        $agenda->paterno= $data->paterno;
        $agenda->materno= $data->materno;
        $agenda->Direccion= $data->Direccion;
        $agenda->Telefono= $data->telefono;
        $agenda->Correo= $data->correo;
        $agenda->usuario_id= $data->id;
        $agenda->grupo_id= $data->grupo;
        $agenda->save();
        $grupo = Grupo::all();
        return view('usuario.registrarContacto',["estatus"=>"success","mensaje"=>"Contacto registrado","grupo"=>$grupo]);
    }
}
