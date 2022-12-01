<?php

namespace App\Http\Controllers;

use App\Models\Estudiante;
use App\Models\Profesor_estudiantes;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Psy\ExecutionLoopClosure;

use function PHPSTORM_META\type;

class tablero_profesor_controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($action = null)
    {
        session_start();

        if (isset($_SESSION['profesor_id'])) {
            $profesor_id = $_SESSION['profesor_id'];

            $var = DB::select("
                select estudiantes.carnet,estudiantes.nombre,estudiantes.sexo,estudiantes.grado 
                from estudiantes
                inner join
                    (select * 
                    from profesor_estudiantes 
                    where carnet_profesor = '$profesor_id'
                ) as tabla
                on 
                estudiantes.carnet=tabla.carnet_estudiante;
            ");

            if (is_null($action))
                return view('tablero_profesor', ['estudiantes' => $var,'error'=>'']);
            elseif ($action == 'inscribir')
                return view('inscribir_estudiante', ['error' => '']);


            elseif ($action == 'error-inscripcion')
                return view('inscribir_estudiante', ['error' => 'Hubo un error en los datos, por favor revíselos bien']);

            elseif ($action == 'error-edicion')
                return view('tablero-profesor', ['estudiantes' => $var,'error' => 'Hubo un error en los datos, por favor revíselos bien']);
            else
            return view('tablero_profesor', ['estudiantes' => $var,'error'=>'']);


        } 
        else{
            return redirect('/acceder');
        }
    }


    public function store(Request $request)
    {
        session_start();
        if (!isset($_SESSION['profesor_id']))
            return redirect('/acceder');

        try {
            $nombre = $request->nombre;
            $carnet = $request->carnet;
            $sexo = $request->sexo;
            $grado = $request->grado;

            $model = new Estudiante();
            $model->nombre = $nombre;
            $model->carnet = $carnet;
            $model->sexo = $sexo;
            $model->grado = $grado;
            $model->save();

            $model = new Profesor_estudiantes();
            $model->carnet_profesor = $_SESSION['profesor_id'];
            $model->carnet_estudiante = $carnet;
            $model->save();

            return redirect('/tablero-profesor');
        } catch (Exception $e) {
            return redirect('/tablero-profesor/error-inscripcion');
        }
    }

    public function update(Request $request, Estudiante $estudiante)
    {
        session_start();
        if (!isset($_SESSION['profesor_id']))
            return redirect('/acceder');

        try {


            $nombre = $request->nombre;
            $carnet = $request->carnet;
            $sexo = $request->sexo;
            $grado = $request->grado;
            $last_carnet = $request->last_carnet;


            DB::delete("
                delete 
                from estudiantes
                where
                carnet='$last_carnet'
            ");

            $model = new Estudiante();
            $model->nombre = $nombre;
            $model->carnet = $carnet;
            $model->sexo = $sexo;
            $model->grado = $grado;
            $model->save();

            $model = new Profesor_estudiantes();
            $model->carnet_profesor = $_SESSION['profesor_id'];
            $model->carnet_estudiante = $carnet;
            $model->save();

            return redirect('/tablero-profesor');
        } catch (Exception $e) {
            redirect('/tablero-profesor/error-edicion');
        }
    }

    public function destroy(Request $request)
    {
        session_start();
        if (!isset($_SESSION['profesor_id']))
            return redirect('/acceder');

        $carnet = $request->carnet;

        DB::delete("
            delete 
            from estudiantes
            where
            carnet = '$carnet'
        ");

        return redirect('/tablero-profesor');
    }
}
