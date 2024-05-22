<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tutores extends Model
{
    use  HasFactory;
    
    //relación uno a muchos (inversa) Comunas
    public function comuna()
    {
        return $this->belongsTo('\App\Models\Comuna', 'id_Comuna_Tutor');
    }
    
    //relación uno a muchos (inversa) Roles
    public function roles()
    {
        return $this->belongsTo('\App\Models\Rol');
    }

    //relación uno a uno (inversa) Personas
    public function persona()
    {
        return $this->belongsTo('\App\Models\Persona', 'rut_Tutor');
    }

    protected $table = 'tutores';
    protected $dates = ['fechaNac_Tutor'];
    protected $primaryKey = 'rut_Tutor';
    protected $fillable = [

        'id_Comuna_Tutor',
        'fotocopiacarnet_Tutor'=>'required',//mimes:pdf
        'registrosocial_Tutor'=>'required',//mimes:pdf
        'id_Rol_Tutor',
        'estado_Tutor'
    ];



}

