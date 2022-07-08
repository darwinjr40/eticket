<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\ApiTrait;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Barryvdh\DomPDF\Facade\Pdf;

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

    protected $fillable = ['ubicacion_id', 'sector_id', 'espacio_id', 'nota_venta_id', 'fecha_lectura', 'precio','clave','cliente','evento','ubicacion','espacio','tipo'];
    static $atributos = ['id', 'ubicacion_id', 'sector_id', 'espacio_id', 'nota_venta_id', 'fecha_lectura', 'precio','clave','cliente','evento','ubicacion','espacio','tipo'];
    //relaciones de tablas
    public function imagenesqr()
    {
        return $this->hasMany(ImagenQr::class);
    }

    
    public function Ubicacion()
    {
        return $this->belongsTo(Ubicacion::class);
    }
    
    public function Sector()
    {
        return $this->belongsTo(Sector::class);
    }
    public function Espacio()
    {
        return $this->belongsTo(Espacio::class);
    }
    //
    static function find1($atributo, $key)
    {
        if (! in_array($atributo, Ticket::$atributos)) {
            return null;        
        }
        return Ticket::where($atributo, $key)->first();
    }

    public function correspondeUser($user_id)
    {
        if ($this->espacio_id) {
            return $this->Espacio->Sector->Ubicacion->Evento->usuario->where('id', $user_id)->first();
        } else if ($this->sector_id) {
            return $this->Sector->Ubicacion->Evento->usuario->where('id', $user_id)->first();
        } else if ($this->ubicacion_id) {
            return $this->Ubicacion->Evento->usuario->where('id', $user_id)->first();
        }
        return null;
    }

 


}