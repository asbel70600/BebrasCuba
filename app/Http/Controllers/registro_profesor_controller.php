<?php

namespace App\Http\Controllers;

use App\Models\Profesor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class registro_profesor_controller extends Controller
{

    public function index()
    {
        return view('registro_profesor');
    }

    public function store(Request $request)
    {
        //ANCHOR - Entrada de datos
        $nombre_profesor = $request->nombre_profesor;
        $correo_profesor = $request->correo_profesor;
        $telefono_profesor = $request->telefono_profesor;
        $carnet_profesor = $request->carnet_profesor;

        $munic = $request->municipio;
        $provincia = $request->provincia;

        $nombre_escuela = $request->nombre_escuela;
        $telefono_escuela = $request->telefono_escuela;

        $contrasena = $request->contrasena;
        
        if(
            $nombre_profesor == '' or
            $telefono_profesor == '' or
            $carnet_profesor == '' or
            $correo_profesor == '' or
            $telefono_escuela == '' or
            $nombre_escuela == '' or
            $provincia == '' or
            $munic == '' or
            $contrasena  == ''
        )
        return 'error';

        $validator = new Validator();
        //ANCHOR - Validacion
        if (
        $validator->checkCorreo($correo_profesor) and
        $validator->checkTelefono($telefono_escuela) and
        $validator->checkTelefono($telefono_profesor) and
        $validator->checkMunicipio($munic) and
        $validator->checkProvincia($provincia)
        )
        
        //ANCHOR - Guardado de datos
        $model = new Profesor();
        $model->nombre = $nombre_profesor;
        $model->telefono = $telefono_profesor;
        $model->correo  = $correo_profesor;
        $model->telefono_escuela = $telefono_escuela;
        $model->escuela = $nombre_escuela;
        $model->contrasena = Hash::make($contrasena);
        $model->provincia = $provincia;
        $model->municipio = $munic;
        $model->carnet = $carnet_profesor;
        $model->save();
    }

}
