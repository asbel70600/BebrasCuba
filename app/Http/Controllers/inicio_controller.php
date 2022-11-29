<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

class inicio_controller extends Controller{

    public function __invoke(){
        return view('inicio');
    }
}
