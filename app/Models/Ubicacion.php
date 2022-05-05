<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Ubicacion
 *
 * @property $id
 * @property $nombre
 * @property $direccion
 * @property $telefono
 * @property $capacidad
 * @property $latitud
 * @property $longitud
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Ubicacion extends Model
{
    
    static $rules = [
		'nombre' => 'required',
		'direccion' => 'required',
		'telefono' => 'required',
		'capacidad' => 'required',
		'latitud' => 'required',
		'longitud' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['nombre','direccion','telefono','capacidad','latitud','longitud'];



}
