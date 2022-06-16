<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImagenQr extends Model
{
    use HasFactory;
    protected $fillable = ['ticket_id','path','pathPrivate'];

    public function ticket(){
        return $this->belongsTo(Ticket::class);
    }
}
