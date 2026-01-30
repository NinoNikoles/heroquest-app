<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $fillable = ['name', 'type', 'sub_type', 'gold_value', 'attack_bonus', 'defence_bonus'];
}
