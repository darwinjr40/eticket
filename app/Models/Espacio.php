<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\ApiTrait;
class Espacio extends Model
{
    use ApiTrait;
    //para la api, por el cual se va poder filtrar
    protected $allowIncluded = ['sector'];
    protected $allowFilter = ['id','numero','descripcion','capacidad', 'id_sector'];
    protected $allowSort = ['id','numero','descripcion','capacidad', 'id_sector'];
    //Fin para filtrar api
    static $rules = [
		'numero' => 'required',
        'descripcion' => 'required',
        'capacidad' => 'required',
        'id_sector' => 'required'
    ];

    protected $primaryKey = 'id';
    protected $table = 'espacios';
    protected $fillable = [
        'id','numero','descripcion','capacidad','estado', 'id_sector'
    ];
    public $timestamps = false;

    public function sector(){
        return $this->belongsTo(Sector::class, 'id_sector');
    }
}
