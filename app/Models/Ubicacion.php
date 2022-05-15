<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\Traits\ApiTrait;
class Ubicacion extends Model
{
    use ApiTrait;
    
    //para la api, por el cual se va poder filtrar
    protected $allowIncluded = ['evento'];
    protected $allowFilter = ['id', 'nombre', 'direccion', 'telefono', 'capacidad', 'latitud', 'longitud'];
    protected $allowSort = ['id', 'nombre', 'direccion', 'telefono', 'capacidad', 'latitud', 'longitud'];
    //Fin para filtrar api


    static $rules = [
		'nombre' => 'required',
		'direccion' => 'required',
		'telefono' => 'required',
		'capacidad' => 'required',
		'latitud' => 'required',
		'longitud' => 'required',
    ];
    
    protected $perPage = 20;
    protected $fillable = ['nombre', 'evento_id','direccion','telefono','capacidad','latitud','longitud'];

	public function evento(){
        return $this->belongsTo(Evento::class);
    }
	public function fechas(){
        return $this->hasMany(Fecha::class,'id');
    }

}
