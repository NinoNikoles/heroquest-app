<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $fillable = [
        'name', 'description', 'type', 'sub_type', 
        'gold_value', 'attack_bonus', 'defence_bonus', 'move_bonus'
    ];

    protected $casts = [
        'name' => 'array',
        'description' => 'array',
    ];
}
