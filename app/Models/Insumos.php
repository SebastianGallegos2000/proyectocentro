<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Insumos extends Model
{
    use HasFactory;
    protected $fillable = [
    'nombre_Insumo',
    'cantidad_Insumo',
    'costo_Insumo',
    'estado_Insumo'
];
}
