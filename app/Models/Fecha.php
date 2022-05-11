<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fecha extends Model
{
    use HasFactory;
    protected $fillable = ['fechaHora','id_ubicacion'];

    public function ubicaciones(){
        return $this->belongsTo(Ubicacion::class,'id_ubicacion');
    }
    
}
