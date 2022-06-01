<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\ApiTrait;
class Fecha extends Model
{
    use HasFactory, ApiTrait;

    //para la api, por el cual se va poder filtrar
    protected $allowIncluded = ['ubicacion'];
    protected $allowFilter = ['id','fechaHora', 'id_ubicacion'];
    protected $allowSort = ['id','fechaHora', 'id_ubicacion'];
    //Fin para filtrar api
    static $rules = [
        'id' => 'required',
        'fechaHora' => 'required',
        'id_ubicacion' => 'required'
    ];

    protected $fillable = ['fechaHora','id_ubicacion'];

    public function ubicacion(){
        return $this->belongsTo(Ubicacion::class,'id_ubicacion');
    }
    
}
