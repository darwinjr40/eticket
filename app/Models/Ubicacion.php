<?php

namespace App\Models;

use App\Http\Resources\TicketResource;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Crypt;

use App\Traits\ApiTrait;
class Ubicacion extends Model
{
    use ApiTrait;
    
    //para la api, por el cual se va poder filtrar
    protected $allowIncluded = ['evento', 'fechas', 'sectores'];
    protected $allowFilter = ['id', 'nombre', 'direccion', 'telefono', 'capacidad','capacidad_disponible','precio','latitud', 'longitud', 'evento_id'];
    protected $allowSort = ['id', 'nombre', 'direccion', 'telefono', 'capacidad','capacidad_disponible','precio','latitud', 'longitud', 'evento_id'];
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
    protected $fillable = ['nombre', 'evento_id','direccion','telefono','capacidad','capacidad_disponible','precio','latitud','longitud'];

	public function evento(){
        return $this->belongsTo(Evento::class);
    }
	public function fechas(){
        return $this->hasMany(Fecha::class,'id_ubicacion');
    }
    //retorna la fecha mayor de una ubicacion
    public function getFechaMayor(){
        // return Fecha::where('id_ubicacion', $this->id)->max('fechaHora');
        return $this->fechas->max('fechaHora');
    }
    public function fechaMayor(){
        $fecha_mayor = $this->fechas->max('fechaHora'); 
        return $this->fechas->where('fechaHora', '>=', $fecha_mayor);
    }
    public function sectores(){
        return $this->hasMany(Sector::class,'id_ubicacion');
    }

    public function correspondeTicket($ticket_key)
    {
        
        
    }
}
