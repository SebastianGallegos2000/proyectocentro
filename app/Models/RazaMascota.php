<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RazaMascota extends Model
{
    use HasFactory;

    protected $table = 'razamascotas';
    protected $primaryKey = 'id_Razamascota';
    protected $fillable = [
        'nombre_Razamascota',
        'estado_Razamascota'
    ];
}
