<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dream extends Model
{
    /** @use HasFactory<\Database\Factories\DreamFactory> */
    use HasFactory;

    public function patterns(){
        return ($this->belongsToMany(Pattern::class));
    }

    public function user(){
        return ($this->belongsTo(User::class));
    }

//make the visibility of a dream dependent on the user setting whether its public or private

    public function isVisibleTo(?User $user): bool{ //supported by claudinhho for args
        if ($this->is_public) {
            return true; //if dream is public, visibility true
        }

        if ($user === null) {
            return false; //if no user aka not logged in visibility false
        }

        if ($user->id === $this->user_id) {
            return true; //if own user, own private dream is visible 
        }

        if ($user->is_admin) {
            return true; //if admin, all dreams visible
        }

        return false;
    }




}
