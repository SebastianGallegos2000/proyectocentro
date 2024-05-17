<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rol extends Model
{
    use HasFactory;

    //Relación uno a muchos
    public function tutores()
    {
        return $this->hasMany('\App\Models\Tutores');
    }

    //Relacion uno a muchos
    public function personal()
    {
        return $this->hasMany('\App\Models\Personal');
    }

    //
    protected $primaryKey = 'id_Rol';
    protected $fillable = [
        'nombre_Rol',
        'estado_Rol'
    ];
}