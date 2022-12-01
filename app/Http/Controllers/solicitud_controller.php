<?php

namespace App\Http\Controllers;

use App\Models\Solicitud;
use Illuminate\Http\Request;

class solicitud_controller extends Controller
{
    public function index($rol)
    {

        if($rol == 'padre')
        {
            return view('solicitud_inscripcion',
            ['text' => "Si usted desea que su hijo participe introduzca los datos de la escuela",
            'user' => $rol]);

        }
        elseif($rol == 'estudiante')
        {
            return view('solicitud_inscripcion',
            ['text' => "Si usted desea participars introduzca los datos de la escuela",
            'user' => $rol]);

        }else
        return 'error';
    }

    public function store(Request $request)
    {
        //ANCHOR - Entrada de datos
        $nombre_solicitante = $request->nombre_solicitante;
        $correo_solicitante = $request->correo_solicitante;
        $telefono_solicitante = $request->telefono_solicitante;

        $nombre_escuela = $request->nombre_escuela;
        $enivel = $request->nivel;
        $telefono_escuela = $request->telefono_escuela;

        $munic = $request->municipio;
        $provincia = $request->provincia;



        //ANCHOR - Validacion
        $validator = new Validator();
        $validator->checkCorreo($correo_solicitante);
        $validator->checkTelefono($telefono_escuela);
        $validator->checkTelefono($telefono_solicitante);
        $validator->checkNivel($enivel);
        $validator->checkMunicipio($munic);
        $validator->checkProvincia($provincia);
        
        if(
            $telefono_escuela == '' or
            $nombre_escuela == '' or
            $enivel == '' or
            $provincia == '' or
            $munic == ''
        )
        return 'error';
  
        //ANCHOR - Guardado de datos
        $model = new Solicitud();
        $model->nobre_solicitante = $nombre_solicitante;
        $model->telefono_solicitante = $telefono_solicitante;
        $model->correo_solicitante  = $correo_solicitante;
        $model->telefono_escuela = $telefono_escuela;
        $model->nombre_escuela = $nombre_escuela;
        $model->nivel = $enivel;
        $model->provincia = $provincia;
        $model->municipio = $munic;
        $model->save();
    }
}
