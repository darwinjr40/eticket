<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventoUser extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'evento_id', 'fecha'];
    protected $table = 'evento_user';
}
