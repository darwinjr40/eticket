<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{
    protected $fillable = ['titulo','descripcion','estado','id_categoria','id_contacto'];
    use HasFactory;
    public function categoria_eventos(){
        return $this->belongsTo(categoriaEvento::class, 'id_categoria');
    }

    public function contactos(){
        return $this->belongsTo(Contacto::class, 'id_contacto');
    }

    // public function imagenes(){
    //     return $this->hasMany(Imagen::class, 'id');
    // }
    // public function ubicaciones(){
    //     return $this->hasMany(Ubicacion::class, 'id');
    // }
    

}
