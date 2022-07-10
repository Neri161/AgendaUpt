<?php

namespace App\Http\Controllers;

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
            'Direccion'=>"required|min:3|max:32|alpha",
            'correo'=>"required|min:3|max:32|alpha",
            'telefono'=>"required|numeric",
            'id'=>"required"
        ]);
        return 'Ya rifaste';
    }
}
