<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class permiso extends Model
{
    protected $primaryKey = 'id';
    protected $table = 'permission';
    protected $fillable = [
        'id','name'
    ];
    public $timestamps = false;
}
