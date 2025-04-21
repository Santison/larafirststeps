<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $table = "LOV"; // Nombre de la tabla en la base de datos
    protected $fillable = [
        'DESCRIPCION',
        'TIPO',
        'ESTADO',
    ];

    // Relación con Faltas
    public function faltas()
    {
        return $this->hasMany(Faltas::class, 'MOTIVO', 'id');
    }
}