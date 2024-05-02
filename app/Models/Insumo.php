<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Insumo extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_Insumo';
    protected $fillable = [
        'nombre_Insumo',
        'cantidad_Insumo',
        'costo_Insumo',
        'estado_Insumo'
    ];
}
