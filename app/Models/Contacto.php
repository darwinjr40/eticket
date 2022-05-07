<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contacto extends Model
{
    use HasFactory;
    protected $fillable = ['nombre','numero','email'];

    public function eventos(){
        return $this->hasMany(Evento::class, 'id');
    }

}
