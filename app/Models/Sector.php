<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sector extends Model
{
    protected $primaryKey = 'id';
    protected $table = 'sectors';
    protected $fillable = [
        'id','nombre','capacidad','capacidad_disponible','precio','referencia','id_ubicacion'
    ];

    public $timestamps = false;
}
