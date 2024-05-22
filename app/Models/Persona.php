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
        return $this->hasOne('\App\Models\Tutor', 'rut_Tutor');
    }

    //Relacion uno a uno con User
    public function user()
    {
        return $this->hasOne('\App\Models\User', 'rut_Usuario');
    }

    //Relación uno a uno con Personal
    public function personal()
    {
        return $this->hasOne('\App\Models\Personal', 'rut_Personal');
    }

    //Relación uno a uno con Admins
    public function administrador()
    {
        return $this->hasOne('\App\Models\Admins', 'rut_Administrador');
    }

    protected $table = 'personas';
    protected $primaryKey = 'rut_Persona';
    protected $fillable = [
        'dv_Persona',
        'nombre_Persona',
        'apellido_Persona',
        'correo_Persona',
        'fechaNac_Persona',
        'telefono_Persona',
        'estado_Persona'
    ];


}
