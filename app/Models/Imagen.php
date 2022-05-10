<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Imagen extends Model
{
    use HasFactory;
    protected $fillable = ['path', 'pathPrivate', 'evento_id'];


    public function evento(){
        return $this->belongsTo(Evento::class);
    }
}
