<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dream extends Model
{
    /** @use HasFactory<\Database\Factories\DreamFactory> */
    use HasFactory;


    public function user(){
        return ($this->belongsTo(User::class));
    }

}
