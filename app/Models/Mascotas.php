<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mascotas extends Model
{
    use HasFactory;

    //Relacion uno a muchos con tutor
    public function tutores(){
        return $this->belongsTo('App\Models\Tutores','tutor_id');
    }

    //Relación uno a muchos con raza mascota
    public function razamascotas(){
        return $this->belongsTo('App\Models\RazaMascota');
    }
}
