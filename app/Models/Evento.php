<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\ApiTrait;
class Evento extends Model
{
    use HasFactory, ApiTrait;
    static $rules = [
		'titulo' => 'required',
		'descripcion' => 'required'
    ];
    //para la api, por el cual se va poder filtrar
    protected $allowIncluded = ['ubicaciones', 'imagenes'];
    protected $allowFilter = ['id', 'titulo', 'descripcion', 'estado', 'id_categoria', 'id_contacto'];
    protected $allowSort = ['id', 'titulo', 'descripcion', 'estado', 'id_categoria', 'id_contacto'];
    //Fin para filtrar api
    protected $fillable = ['titulo', 'descripcion', 'estado', 'id_categoria', 'id_contacto'];
    
    
    public function categoria_eventos()
    {
        return $this->belongsTo(categoriaEvento::class, 'id_categoria');
    }

    public function contactos()
    {
        return $this->belongsTo(Contacto::class, 'id_contacto');
    }

    public function ubicaciones()
    {
        return $this->hasMany(Ubicacion::class);
    }

    public function imagenes()
    {
        return $this->hasMany(Imagen::class);
    }
}
