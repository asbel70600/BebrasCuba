<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Date;
use Psy\CodeCleaner\ReturnTypePass;

class Validator
{

    public function checkCorreo($correo)
    {
        $correo = filter_var($correo, FILTER_SANITIZE_EMAIL);
        if (strlen($correo) > 50)
            throw new Exception('El campo de correo es incorrecto');

        if ($correo == '')
            throw new Exception('El campo de correo está vacío');

        return $correo;
    }

    public function checkTelefono($telefono)
    {
        $telefono = $this->cleanString($telefono);
        $telefono = filter_var($telefono, FILTER_SANITIZE_NUMBER_INT);

        if($telefono == '')
            throw new Exception('El campo de teléfono no puede estar vacío');

        if (!(($telefono > 21111111 and $telefono < 48999999) or ($telefono > 51111111 and $telefono < 59999999) or strlen($telefono) == 8))
            throw new Exception('El campo de teléfono incorrecto');
        
        return $telefono;
    }

    public function checkNivel($nivel)
    {
        //El nivel educativo
        switch ($nivel) {
            case 'primaria':
                return $nivel;
                break;
            case 'secundaria':
                return $nivel;
                break;
            case 'preuniversitario':
                return $nivel;
                break;
        }
        if ($nivel == '')
            throw new Exception('El campo de nivel educativo no puede estar vacío');

        throw new Exception('El campo de nivel educativo es incorrecto');
    }

    public function checkSexo($sexo)
    {
        if($sexo == '')
            throw new Exception('El campo de sexo no puede estar vacío');

        if ($sexo != 'M' and $sexo != 'F')
            throw new Exception('El campo de sexo es incorrecto');

        return $sexo;
    }

    public function checkGrado($grado)
    {
        //El grado debe estar entre 1ro y 12
        if($grado == '')
            throw new Exception('El campo de grado no puede estar vacío');
        if (!($grado >= '1' and $grado <= '12'))
            throw new Exception('El campo de grado es incorrecto');

        return $grado;
    }

    public function checkCarnet($carnet)
    {
        if($carnet == '')
            throw new Exception('El campo de carnet no puede estar vacío');

        //Limpieza del carnet
        $carnet = $this->cleanString($carnet);
        $carnet = filter_var($carnet, FILTER_SANITIZE_NUMBER_INT);

        //Comprobando la cantidad de caracteres luego de la limpieza
        //el carnet cubano tiene 11 numeros
        if (strlen($carnet) < 11)
            throw new Exception('El campo de carnet es incorrecto');

        //El milenio varia en funcion del 7mo digito
        if ($carnet[6] >= 0 and $carnet[6] <= 5)
            $milenio = '19';
        else
            $milenio = '20';

        //Descomposicion de la fecha del carnet
        $year = $milenio . substr($carnet, 0, 2);
        $month = substr($carnet, 2, 2);
        $day = substr($carnet, 4, 2);

        //Descomposicion de la fecha actual
        $now_year = date('Y');
        $now_month = date('m');
        $now_day = date('d');

        //Comprobando que la fecha del carnet sea correcta
        if (!checkdate($month, $day, $year))
            throw new Exception('El campo de carnet es incorrecto');

        //Convirtiendo las fechas a dias para restarlas
        $dias_hasta_hoy = GregorianToJD($now_month, $now_day, $now_year);
        $dias_hasta_fecha = GregorianToJD($month, $day, $year);

        //No es valido para la inscripcion si han pasado
        //menos de 5 años, (1825) días
        if (($dias_hasta_hoy - $dias_hasta_fecha) < 1825)
            throw new Exception('El campo de carnet es incorrecto');

        // Si no dio problemas, se retorna el carnet limpio
        return $carnet;
    }

    public function cleanString($string)
    {
        $replace = array('(\+)', '(\-)');

        $string = preg_replace($replace, '', $string);

        $string = preg_replace('/\s+/', '', $string);

        return $string;
    }

    public function isKnownError($error){
        $inicio = substr($error,0,12);
        if($inicio == 'El campo de ')
            return true;
        else
            return false;
    }
    // public function checkMunicipio($munic)
    // {
    //     $municipios_encontrados = DB::select("select nombre from municipios where nombre = $munic");
    //     if (count($municipios_encontrados) != 1)
    //         throw new Exception('Municipio incorrecto');
    // }
    // public function checkProvincia($provincia)
    // {
    //     $provincias_encontradas = DB::select("select nombre from municipios where nombre = $provincia");
    //     if (count($provincias_encontradas) != 1)
    //         throw new Exception('Provincia erronea');
    // }
}
