<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profesor extends Model
{
    use HasFactory;

    protected $table = "PROFESOR"; // Nombre de la tabla en la base de datos

    protected $fillable = [
        'CODPROFESOR',
        'NOMBRE'
    ];

}
