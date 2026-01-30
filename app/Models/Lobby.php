<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lobby extends Model
{
    protected $fillable = ['name', 'zargon_id', 'code'];

    protected static function booted()
    {
        static::creating(function ($lobby) {
            $lobby->code = strtoupper(substr(md5(uniqid()), 0, 24)); // Erzeugt z.B. "A1B2C3"
        });
    }

    public function getRouteKeyName()
    {
        return 'code'; // Die Spalte in deiner Datenbank
    }

    public function characters()
    {
        return $this->hasMany(HeroCharacter::class);
    }
}
