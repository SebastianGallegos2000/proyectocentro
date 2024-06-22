<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModificacionInsumo extends Model
{
    use HasFactory;
    protected $table = 'modificacioninsumos';
    protected $primaryKey = 'id';
    protected $fillable = [
        'personal_id',
        'insumo_id',
        'fechayhora_ModificacionInsumo',
        'cantidad_ModificacionInsumo',
        'personal_id'
    ];

}
