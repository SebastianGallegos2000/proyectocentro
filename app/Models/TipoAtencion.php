<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoAtencion extends Model
{
    use HasFactory;

    //Relación uno a muchos con mascotas (inversa)
    public function mascotas(){
        return $this->hasMany('App\Models\Mascotas');
    }

    protected $table = 'tipoatenciones';
    protected $fillable = [
        'nombre_TipoAtencion',
        'costo_TipoAtencion',
        'estado_TipoAtencion'
    ];
}
