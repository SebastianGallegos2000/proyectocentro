<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Atenciones extends Model
{
    use HasFactory;

    //Relación uno a muchos con SolicitudCitas
    public function solicitudcitas(){
        return $this->belongsTo(SolicitudCitas::class,'solicitudcita_id');
    }

    //Relación uno a muchos con Personal
    public function personal(){
        return $this->belongsTo(Personal::class);
    }


    protected $table = 'atenciones';
    protected $primaryKey = 'id';
    protected $fillable = [
        'solicitudcita_id',
        'personal_id',
        'observacion_Atencion',
        'peso_Atencion',
        'estado_Atencion',
    ];
}
