<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RazaMascota extends Model
{
    use HasFactory;

    protected $table = 'razamascotas';
    protected $primaryKey = 'id_RazaMascota';
    protected $fillable = [
        'nombre_RazaMascota',
        'estado_RazaMascota'
    ];
}
