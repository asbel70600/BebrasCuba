<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;

class acceder_controller extends Controller
{

    public function index(){

        session_start();
        return view('acceder',['error' => '']);
    }

    public function store(Request $request){

        // Limpiar si estamos usando Cadenas
        $email = filter_var($request->correo, FILTER_SANITIZE_EMAIL);
        $pass = $request->contrasena;

        $validation = DB::select("
        select contrasena, carnet,validado,correo
        from profesores
        where
        profesores.correo='$email' 
        ");

        if (password_verify($pass, $validation[0]->contrasena) and $validation[0]->validado == true) {

            //     $carnet = DB::select("
            //     select carnet 
            //     from profesores
            //     where
            //     correo = '$email'
            // ");

            $carnet = $validation[0]->carnet;
            session_reset();
            session_start();
            $_SESSION['profesor_id'] = $carnet;

            return Redirect::to('/tablero-profesor');


        } elseif (password_verify($pass, $validation[0]->contrasena) and $validation[0]->validado == false)

            return view('acceder', ['error' => 'sus credenciales no han sido verificadas por nuestro equipo']);

        else

            return view('acceder', ['error' => 'sus credenciales son incorrectas']);
    }
}
