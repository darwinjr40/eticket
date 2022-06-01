<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\ApiTrait;
class Imagen extends Model
{
    use HasFactory, ApiTrait;
    //para la api, por el cual se va poder filtrar
    protected $allowIncluded = ['evento'];
    protected $allowFilter = ['id','path', 'pathPrivate', 'evento_id'];
    protected $allowSort = ['id','path', 'pathPrivate', 'evento_id'];
    //Fin para filtrar api
    static $rules = [
		'evento_id' => 'required',
    ];
    protected $fillable = ['path', 'pathPrivate', 'evento_id'];


    public function evento(){
        return $this->belongsTo(Evento::class);
    }
}
