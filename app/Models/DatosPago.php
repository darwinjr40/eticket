<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\ApiTrait;

class DatosPago extends Model
{
    use ApiTrait;
    protected $allowIncluded = ['tipo_pago'];
    protected $allowFilter = ['id','ci','nombre','nro', 'estado', 'id_tipoPago'];
    protected $allowSort = ['id','ci', 'nombre', 'nro','estado', 'id_tipoPago'];
    //Fin para filtrar api
    static $rules = [
		'ci' => 'required',
        'nombre' => 'required',
        'nro' => 'required',
        'estado' => 'required',
        'id_tipoPago' => 'required'
    ];

    protected $primaryKey = 'id';
    protected $table = 'datos_pagos';
    protected $fillable = [
        'id','ci','nombre','nro','estado', 'id_tipoPago'
    ];
    public $timestamps = false;

    public function tipoPago(){
        return $this->belongsTo(TipoPago::class, 'id_tipoPago');
    }
}
