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

        //relación uno a uno (inversa) Personas
        public function persona()
        {
            return $this->belongsTo('\App\Models\Persona');
        }

        //relación muchos a muchos (inversa) Especialidades
        public function especialidad()
        {
            return $this->belongsTo('\App\Models\Especialidad');
        }

        //Relacion uno a muchos (inversa) con Atenciones
        public function atenciones(){
            return $this->belongsTo('App\Models\Atenciones');
        }


        protected $table = 'personales';
        protected $primaryKey = 'id';
        protected $fillable = [
            'persona_id',
            'especialidad_id',
            'estado_Personal'
        ];
}

