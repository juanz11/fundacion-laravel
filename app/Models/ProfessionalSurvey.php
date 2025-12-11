<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProfessionalSurvey extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre_completo',
        'cedula',
        'direccion',
        'numero_colegiatura',
        'lugar_consulta',
        'edad',
        'email',
        'especialidad',
        'telefono',
        'genero',
    ];
}
