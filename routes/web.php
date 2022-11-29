<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\inicio_controller;
use App\Http\Controllers\acceder_controller;
use App\Http\Controllers\eventos_controller;
use App\Http\Controllers\recursos_controller;
use App\Http\Controllers\registro_estudiante_controller;
use App\Http\Controllers\registro_tutor_controller;

//ANCHOR - Rutas de Usuario
Route::get('/', function () {
    return redirect('/inicio');
});

Route::get('/inicio',inicio_controller::class);
Route::get('/acceder',acceder_controller::class);
Route::get('/eventos',eventos_controller::class);
Route::get('/recursos',recursos_controller::class);

Route::resource('/registro-estudiante',registro_estudiante_controller::class);
Route::resource('/registro-tutor',registro_tutor_controller::class);


//Route::get('/registro-estudiante',registro_estudiante_controller::class);
//Route::get('/registro-tutor',registro_tutor_controller::class);

//ANCHOR - Rutas de base de datos
//Route::post('/registro-estudiante',[registro_estudiante_controller::class,'crear_estudiante']);








/* 
redirections inserver
Route::get('home', function() {
    return redirect('another place');
});

downloading a file from public
Route::get('home', function() {
    return response()->download(public_path('direction/to/archive.txt'));
});

laravel supported http methods
get
post
put
patch
delete
options


*/