<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class rolPermiso extends Model
{
    protected $primaryKey = 'id';
    protected $table = 'rolpermiso';
    protected $fillable = [
        'id', 'rol_id', 'permission_id'
    ];
    public $timestamps = false;

    public function permissions()
    {
        return $this->belongsTo(permiso::class,'permission_id','id');
    }
}
