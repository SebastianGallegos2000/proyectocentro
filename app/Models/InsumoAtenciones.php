<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InsumoAtenciones extends Model
{
    use HasFactory;


    protected $table = 'insumo_atencion';
    protected $fillable = [
        'id_Insumo_Nav', 
        'id_Atencion_Nav', 
        'cantidad'
    ];
}
