<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profesor_estudiantes extends Model
{
    protected $table = 'profesor_estudiantes';
    public $timestamps = false;
    protected $primaryKey = 'carnet';
    public $incrementing = false;
}