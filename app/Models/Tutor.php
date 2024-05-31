<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Tutor extends Model
{
    use  HasFactory;
    
    //relación uno a muchos (inversa) Comunas
    public function comuna()
    {
        return $this->belongsTo('\App\Models\Comuna','comuna_id');
    }
    
    //relación uno a uno (inversa) Personas
    public function persona()
    {
        return $this->belongsTo('\App\Models\Persona');
    }

    //Relacion uno a muchos (inversa) con mascotas
    public function mascotas(){
        return $this->belongsTo('App\Models\Mascotas');
    }

    protected $table = 'tutores';
    protected $dates = ['fechaNac_Tutor'];
    protected $fillable = [
        'persona_id',
        'comuna_id',
        'fotocopiacarnet_Tutor'=>'required',//mimes:pdf
        'registrosocial_Tutor'=>'required',//mimes:pdf
        'estado_Tutor'
    ];





}