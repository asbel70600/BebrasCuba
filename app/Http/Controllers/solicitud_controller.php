<?php

namespace App\Http\Controllers;

use App\Models\Solicitud;
use Exception;
use Illuminate\Http\Request;

class solicitud_controller extends Controller
{
    public function index($rol, $error = '')
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        if ($rol == 'padre') {

            $_SESSION['rol'] =  $rol;

            return view(
                'solicitud_inscripcion',
                [
                    'text' => "Si usted desea que su hijo participe introduzca los datos de la escuela",
                    'user' => $rol,
                    'error' => $error
                ]
            );
        } elseif ($rol == 'estudiante') {

            $_SESSION['rol'] =  $rol;

            return view(
                'solicitud_inscripcion',
                [
                    'text' => "Si usted desea participar introduzca los datos de la escuela",
                    'user' => $rol,
                    'error' => $error
                ]
            );
        } else
            return redirect('/inicio');
    }

    public function store(Request $request)
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        $rol = $_SESSION['rol'];

        //ANCHOR - Entrada de datos
        $nombre_solicitante = $request->nombre_solicitante;
        $correo_solicitante = $request->correo_solicitante;
        $telefono_solicitante = $request->telefono_solicitante;
        $nombre_escuela = $request->nombre_escuela;
        $enivel = $request->nivel;
        $telefono_escuela = $request->telefono_escuela;
        $munic = $request->municipio;
        $provincia = $request->provincia;


        try {

            //ANCHOR - Validacion
            $validator = new Validator();
            
            if($correo_solicitante!='')
                $correo_solicitante = $validator->checkCorreo($correo_solicitante);
            
            if($telefono_solicitante)
                $telefono_solicitante = $validator->checkTelefono($telefono_solicitante);
            
            
            $telefono_escuela = $validator->checkTelefono($telefono_escuela);
            $validator->checkNivel($enivel);
            // $validator->checkMunicipio($munic);
            // $validator->checkProvincia($provincia);

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
            
            return view('inicio',['texto' => 'Operación completada']);

        } catch (Exception $e) {

            if($validator -> isKnownError($e->getMessage()))
                return $this->index($rol,$e->getMessage());

            elseif(substr($e->getMessage(),0,33)=='SQLSTATE[23505]: Unique violation')
                return $this->index($rol,'Ya se ha hecho una solicitud para su escuela');

            else
                return $this->index($rol,'Error vuelva a intentarlo');
        }
    }
}
