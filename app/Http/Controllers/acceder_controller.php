<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class acceder_controller extends Controller{
    
    public function __invoke(){
        return view('acceder');
    }
}