<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    use HasFactory;

    //Relacion uno a uno con Tutor
    public function tutor()
    {
        return $this->hasOne('\App\Models\Tutor','persona_id');
    }

    //Relacion uno a uno con User
    public function user()
    {
        return $this->belongsTo('\App\Models\User');
    }

    //Relación uno a uno con Personal
    public function personal()
    {
        return $this->hasOne('\App\Models\Personal','persona_id');
    }

    //Relación uno a uno con Admins
    public function administrador()
    {
        return $this->hasOne('\App\Models\Admins');
    }

    protected $table = 'personas';
    protected $fillable = [
        'rut_Persona',
        'dv_Persona',
        'nombre_Persona',
        'apellido_Persona',
        'correo_Persona',
        'fechaNac_Persona',
        'telefono_Persona',
        'estado_Persona'
    ];


}