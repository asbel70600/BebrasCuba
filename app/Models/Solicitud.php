<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Solicitud extends Model
{
    protected $table = 'solicitudes';
    public $timestamps = false;
    protected $primaryKey = 'telefono_escuela';
    public $incrementing = false;
}