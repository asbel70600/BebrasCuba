<?php

namespace App\Http\Controllers;

use App\Models\Profesor;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class registro_profesor_controller extends Controller
{

    public function index()
    {
        return view('registro_profesor',[
            'error' => ''
        ]);
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
       
        try{

            $validator = new Validator();
            $validator->checkCorreo($correo_profesor);
            $validator->checkTelefono($telefono_escuela);
            $validator->checkTelefono($telefono_profesor);
            $validator->checkCarnet($carnet_profesor);
            //$validator->checkMunicipio($munic);
            //$validator->checkProvincia($provincia);
        
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

            return view('inicio',['texto' => 'Operación exitosa']);
            
        } catch (Exception $e) {

            if($validator -> isKnownError($e->getMessage()))
                return view('registro_profesor',['error' => $e->getMessage()]);

            elseif(substr($e->getMessage(),0,33)=='SQLSTATE[23505]: Unique violation')
                return view('registro_profesor',['error' => 'Ya se ha registrado? Trate acceder']);

            else
                return view('registro_profesor',['error'=>'Error vuelva a intentarlo']);
        }
    }

}