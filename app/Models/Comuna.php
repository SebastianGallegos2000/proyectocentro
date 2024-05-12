<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comuna extends Model
{
    use HasFactory;

        //Relación uno a muchos
        public function tutores()
        {
            return $this->hasMany('\App\Models\Tutores');
        }

        protected $primaryKey = 'id_Comuna';
        protected $fillable = [
            'nombre_Comuna',
            'estado_Comuna'
        ];
}
