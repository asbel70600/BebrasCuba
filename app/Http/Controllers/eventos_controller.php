<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class eventos_controller extends Controller{
    
    public function __invoke(){
        return view('eventos');
    }
}