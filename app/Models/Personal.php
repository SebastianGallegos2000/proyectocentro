<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Personal extends Model
{
    use HasFactory;

        ////relación uno a muchos (inversa) Comunas
        //public function comuna()
        //{
        //    return $this->belongsTo('\App\Models\Comuna');
        //}
        //
        //relación uno a muchos (inversa) Comunas
        public function roles()
        {
            return $this->belongsTo('\App\Models\Rol');
        }

        //relación muchos a muchos (inversa) Especialidades
        public function especialidad()
        {
            return $this->belongsToMany('\App\Models\Especialidad');
        }

    protected $dates = ['fechaNac_Personal'];
    protected $table = 'personales';
    protected $primaryKey = 'rut_Personal';
    protected $fillable = [
        'dv_Personal',
        'password_Personal',
        'nombre_Personal',
        'apellido_Personal',
        'correo_Personal',
        'fechaNac_Personal',
        'telefono_Personal',
        'id_Especialidad_Personal',
        'id_Rol_Personal',
        'estado_Personal'
    ];
}

