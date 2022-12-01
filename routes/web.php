<?php

use App\Http\Controllers\AAAA;
use App\Http\Controllers\acceder_controller;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\registro_profesor_controller;
use App\Http\Controllers\solicitud_controller;
use App\Http\Controllers\tablero_profesor_controller;

//ANCHOR - Rutas de Usuario
Route::permanentredirect('/','/inicio');

Route::view('/inicio','inicio');
Route::view('/eventos','eventos');
Route::view('/recursos','recursos');


Route::get('/acceder',[acceder_controller::class,'index']);
Route::post('/acceder',[acceder_controller::class,'store']);

Route::get('/registro-profesor',[registro_profesor_controller::class,'index']);
Route::post('/registro-profesor',[registro_profesor_controller::class,'store']);

Route::get('/solicitud-inscripcion/{rol}',[solicitud_controller::class,'index']);
Route::post('/solicitud-inscripcion/{rol}',[solicitud_controller::class,'store']);

Route::get('/tablero-profesor', [tablero_profesor_controller::class,'index']);
Route::get('/tablero-profesor/{accion}', [tablero_profesor_controller::class,'index']);
Route::post('/tablero-profesor',[tablero_profesor_controller::class,'store']);
Route::delete('/tablero-profesor', [tablero_profesor_controller::class,'destroy']);
Route::put('/tablero-profesor',[tablero_profesor_controller::class,'update']);
