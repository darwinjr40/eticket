<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
/**
 * Class Espacio
 *
 * @property $id
 * @property $numero
 * @property $descripcion
 * @property $capacidad
 * @property $id_sector
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Espacio extends Model
{
    protected $primaryKey = 'id';
    protected $table = 'espacios';
    protected $fillable = [
        'id','numero','descripcion','capacidad', 'id_sector'
    ];
    use HasFactory;
    public function sectors(){
        return $this->belongsTo(Sector::class, 'id_sector');
    }
}
