<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mascotas extends Model
{
    use HasFactory;

    //Relacion uno a muchos con tutor
    public function tutor(){
        return $this->belongsTo('App\Models\Tutor','tutor_id');
    }

    //Relación uno a muchos con raza mascota
    public function razamascotas(){
        return $this->belongsTo('App\Models\RazaMascota','razamascota_id');
    }

    //Relacion con SolicitudCita
    public function solicitudcitas(){
        return $this->hasMany(SolicitudCitas::class,'mascota_id');
    }

    protected $table = 'mascotas';
    protected $primaryKey = 'id';
    protected $fillable = [
        'tutor_id',
        'nombre_Mascota',
        'razamascota_id',
        'nroChip_Mascota',
        'peso_Mascota',
        'edad_Mascota',
        'especie_Mascota',
        'sexo_Mascota',
        'estado_Mascota',
    ];
}
