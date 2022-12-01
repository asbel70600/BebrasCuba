<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;

class acceder_controller extends Controller{
    

    public function index(){
        session_start();
        return view('acceder');
    }

    public function store(Request $request)
    {
        session_start();
        // Limpiar si estamos usando Cadenas
        $email= filter_var($request->correo, FILTER_SANITIZE_EMAIL);
        $pass = $request->contrasena;

        $validation = DB::select("
        select contrasena
        from profesores
        where
        profesores.correo='$email' 
        ");


        if (password_verify($pass,$validation[0]->contrasena))
        {
            $carnet = DB::select("
            select carnet 
            from profesores
            where
            correo = '$email'
        ");
    
        $_SESSION['profesor_id'] = $carnet[0]->carnet;
            return Redirect::to('/tablero-profesor');
        }
        else
            return 'not logged';
        
        
    
    }
}