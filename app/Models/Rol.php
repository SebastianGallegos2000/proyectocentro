<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rol extends Model
{
    use HasFactory;

    //Relación uno a muchos con User
    public function user(){
        return $this->hasMany('\App\Models\User');
    }


    protected $fillable = [
        'nombre_Rol',
        'estado_Rol'
    ];
}