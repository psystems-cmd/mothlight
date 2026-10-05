<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pattern extends Model
{
    use HasFactory;

    public function dreams(){
        return ($this->belongsToMany(Dream::class));
    }
}
