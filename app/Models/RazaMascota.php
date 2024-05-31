<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RazaMascota extends Model
{
    use HasFactory;

    protected $table = 'razamascotas';
    protected $fillable = [
        'nombre_Razamascota',
        'estado_Razamascota'
    ];

    //Relación uno a muchos con mascotas
    public function mascotas(){
        return $this->hasMany('App\Models\Mascotas');
    }
}
