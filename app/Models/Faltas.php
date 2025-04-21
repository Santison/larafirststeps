<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Faltas extends Model
{
    use HasFactory;

    protected $table = "FALTAS"; // Nombre de la tabla en la base de datos

    protected $fillable = [
        'SEC_FALTAS',
        'CODPROFESOR',
        'DIA_INICIO',
        'DIA_FIN',
        'MOTIVO',
    ];

    // Relación con el modelo Profesor
    public function profesor()
    {
        return $this->belongsTo(Profesor::class, 'CODPROFESOR', 'CODPROFESOR');
    }

    // Relación con Post (LOV)
    public function motivo()
    {
        return $this->belongsTo(Post::class, 'MOTIVO', 'id');
    }
}
