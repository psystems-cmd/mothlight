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

    // Claude:: a pattern's colour and meaning come from config/patterns.php,
    // because the patterns table only stores a name.

    // The pattern's own accent colour, as a hex value for use in CSS.
    public function accentHex(): string
    {
        $accents = config('patterns.accents');
        $named = config('patterns.meanings')[$this->name]['accent'] ?? null;

        if ($named && isset($accents[$named])) {
            return $accents[$named];
        }

        // Not in the list: pick one from the id, so it stays the same every visit
        return array_values($accents)[$this->id % count($accents)];
    }

    // The short description shown on the pattern's own page, or null if unknown.
    public function meaning(): ?string
    {
        return config('patterns.meanings')[$this->name]['text'] ?? null;
    }
}
