<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dream extends Model
{
    /** @use HasFactory<\Database\Factories\DreamFactory> */
    use HasFactory;

    /**
     * Turn dreamt_at into a real date object, so views can format it (e.g. "3 October, 23:30").
     */
    protected function casts(): array
    {
        return [
            'dreamt_at' => 'datetime',
        ];
    }

    public function patterns(){
        return ($this->belongsToMany(Pattern::class));
    }

    public function user(){
        return ($this->belongsTo(User::class));
    }

}
