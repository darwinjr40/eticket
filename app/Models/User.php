<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;
use Laravel\Sanctum\HasApiTokens;

//use Spatie\Permission\Traits\HasRoles;


class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    CONST ADMINISTRADOR = 1;
    CONST CLIENTE = 2;
    CONST EMPLEADO = 3;
    protected $fillable = [
        'name',
        'email',
        'password',
        'rol_id'
    ];
    
    
    
    
    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function Rol()
    {
       return  $this->belongsTo(rol::class);
    }

    public function eventos()
    {
        return $this->belongsToMany(Evento::class)->orderBy('id', 'desc')->as('relation')->withPivot(['fecha'])->withTimestamps();
    }
    
    public function eventosDisponibles()
    {
         $lista_ubicacion_id =  DB::table('fechas as f')
        ->select('f.id_ubicacion', DB::raw('Max(f."fechaHora") as fecha_maxima'))
        ->groupBy('f.id_ubicacion')
        ->havingRaw('Max(f."fechaHora") <= ?', [now()])
        ->pluck('f.id_ubicacion');    
        $lista = new Collection();
        foreach ($this->eventos as $evento) {
            if ($evento->ubicaciones->whereIn('id', $lista_ubicacion_id)->count() > 0)
                $lista->prepend(Evento::find($evento->id));            
        }            
          return $lista;
    }
}




