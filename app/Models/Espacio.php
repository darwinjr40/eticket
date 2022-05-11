<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Espacio extends Model
{
    protected $primaryKey = 'id';
    protected $table = 'espacios';
    protected $fillable = [
        'id','numero','descripcion','capacidad', 'id_sector'
    ];
    public $timestamps = false;
}
