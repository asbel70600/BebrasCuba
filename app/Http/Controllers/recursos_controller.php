<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class recursos_controller extends Controller{
    
    public function __invoke(){
        return view('recursos');
    }
}