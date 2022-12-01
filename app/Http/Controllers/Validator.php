<?php
namespace App\Http\Controllers;

class Validator{
    
    public function checkCorreo($correo){

        if (!filter_var($correo, FILTER_VALIDATE_EMAIL) or strlen($correo) > 50)
            return false;
        else
            return true;
    }
    
    public function checkTelefono($telefono){
        if(($telefono > 21111111 and $telefono < 48999999) or ($telefono>51111111 and $telefono<59999999))
        return true;
        else
        return false;
    }

    public function checkNivel($nivel){

        switch($nivel)
        {
            case 'primaria':
                return true;
            case 'secundaria':
                return true;
            case 'pre':
                return true;
        }
        return false;
    }

    public function checkSexo($sexo)
    {
        if($sexo == 'M' or $sexo == 'F')
            return true;
        else
            return false;
    }

    public function checkGrado($grado)
    {
        if($grado >= '1' and $grado <= '12')
            return true;
        else
            return false;
    }
    public function checkMunicipio($munic){
        
    }
    public function checkProvincia($provincia){

    }
}