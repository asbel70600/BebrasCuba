<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\inicio_controller;
use App\Http\Controllers\acceder_controller;
use App\Http\Controllers\eventos_controller;
use App\Http\Controllers\recursos_controller;

//ANCHOR - Rutas de Usuario

Route::get('/', function () {
    return redirect('/inicio');
});

Route::get('/inicio',inicio_controller::class);
Route::get('/acceder',acceder_controller::class);
Route::get('/eventos',eventos_controller::class);
Route::get('/recursos',recursos_controller::class);