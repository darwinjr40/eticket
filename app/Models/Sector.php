<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sector extends Model
{
    protected $primaryKey = 'id';
    protected $table = 'sectors';
    //para la api, por el cual se va poder filtrar
    protected $allowIncluded = ['ubicacion', 'espacios'];
    protected $allowFilter = ['id','nombre','capacidad','referencia','id_ubicacion'];
    protected $allowSort = ['id','nombre','capacidad','referencia','id_ubicacion'];
    //Fin para filtrar api
    static $rules = [
        'id' => 'required',
        'nombre' => 'required',
        'capacidad' => 'required',
        'referencia' => 'required',
        'id_ubicacion' => 'required'
    ];
    protected $fillable = [
        'id','nombre','capacidad','referencia','id_ubicacion'
    ];
    public $timestamps = false;

    public function ubicacion(){
        return $this->belongsTo(Ubicacion::class, 'id_ubicacion');
    }

    public function espacios(){
        return $this->hasMany(Espacio::class, 'id_sector');
    }
}
