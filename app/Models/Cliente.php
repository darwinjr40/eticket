<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\ApiTrait;

class Cliente extends Model
{
    use ApiTrait;
    //para la api, por el cual se va poder filtrar
    protected $allowIncluded = ['user'];
    protected $allowFilter = ['id','name','email'];
    protected $allowSort = ['id','name','email'];
    //Fin para filtrar api
    static $rules = [
		'numero' => 'required',
        'descripcion' => 'required',
        'capacidad' => 'required',
        'id_sector' => 'required'
    ];

    protected $primaryKey = 'id';
    protected $table = 'clientes';
    protected $fillable = [
        'id','telefono'
    ];
    public $timestamps = false;

    public function user(){
        return $this->belongsTo(User::class, 'id');
    }
}
