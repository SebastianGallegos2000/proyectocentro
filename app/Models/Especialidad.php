<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Especialidad extends Model
{
    use HasFactory;
    
    //relacion muchos a muchos
        public function personal()
        {
            return $this->belongsToMany('\App\Models\Personal');
        }

    protected $table = 'especialidades';
    protected $primaryKey = 'id_Especialidad';
    protected $fillable = [
        'nombre_Especialidad',
        'estado_Especialidad'
    ];
}
