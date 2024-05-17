<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Tutores extends Model
{
    use HasFactory;
    
    //relación uno a muchos (inversa) Comunas
    public function comuna()
    {
        return $this->belongsTo('\App\Models\Comuna');
    }
    
    //relación uno a muchos (inversa) Roles
    public function roles()
    {
        return $this->belongsTo('\App\Models\Rol');
    }
    protected $dates = ['fechaNac_Tutor'];
    protected $primaryKey = 'rut_Tutor';
    protected $fillable = [
        'dv_Tutor',
        'password_Tutor',
        'nombre_Tutor',
        'apellido_Tutor',
        'correo_Tutor',
        'fechaNac_Tutor',
        'telefono_Tutor',
        'id_Comuna_Tutor',
        'fotocopiacarnet_Tutor'=>'required',//mimes:pdf
        'registrosocial_Tutor'=>'required',//mimes:pdf
        'id_Rol_Tutor',
        'estado_Tutor'
    ];



}

