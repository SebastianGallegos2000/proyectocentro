<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SolicitudCitas extends Model
{
    use HasFactory;

    //Relación uno a muchos (inversa) con Mascotas
    public function mascota(){
        return $this->belongsTo(Mascotas::class);
    }

    //Relación uno a muchos (inversa) con TipoAtencion
    public function tipoatencion(){
        return $this->belongsTo(TipoAtencion::class);
    }

    //Relación uno a muchos con Atenciones
    public function atenciones(){
        return $this->hasMany(Atenciones::class,'solicitudcita_id','id');
    }

    protected $table = 'solicitudcitas';
    protected $primaryKey = 'id';
    protected $fillable = [
        'mascota_id',
        'tipoatencion_id',
        'fecha_SolicitudCita',
        'horaInicio_SolicitudCita',
        'horaTermino_SolicitudCita',
        'estado_SolicitudCita',
    ];
}
