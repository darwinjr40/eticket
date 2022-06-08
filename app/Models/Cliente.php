<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $primaryKey = 'id';
    protected $table = 'clientes';
    protected $fillable = [
        'id','telefono'
    ];
    public $timestamps = false;
}
