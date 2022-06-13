<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoPago extends Model
{
    protected $primaryKey = 'id';
    protected $table = 'tipo_pagos';
    protected $fillable = [
        'id','forma'
    ];
    public $timestamps = false;
}
