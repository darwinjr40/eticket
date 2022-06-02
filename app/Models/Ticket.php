<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\ApiTrait;
class Ticket extends Model
{
    use HasFactory, ApiTrait;
    //para la api, por el cual se va poder filtrar
    protected $allowIncluded = [];
    protected $allowFilter = ['id', 'fecha', 'precio', 'clave', 'cliente', 'evento', 'ubicacion', 'espacio', 'tipo'];
    protected $allowSort = ['id', 'fecha', 'precio', 'clave', 'cliente', 'evento', 'ubicacion', 'espacio', 'tipo'];
    static $rules = [
        'id' => 'required',
        'fecha' => 'required',
        'precio' => 'required',
        'clave' => 'required',
        'cliente' => 'required',
        'evento' => 'required',
        'ubicacion' => 'required',
        'espacio' => 'required',
        'tipo' => 'required',
    ];
}
