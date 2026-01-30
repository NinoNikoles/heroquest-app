<?php

namespace App\Models;

use App\Models\Lobby;
use App\Models\Item;
use Illuminate\Database\Eloquent\Model;

class HeroCharacter extends Model
{
    protected $fillable = [
        'user_id', 
        'lobby_id', 
        'name', 
        'class',
        'base_body_points',
        'body_points',
        'base_mind_points',
        'mind_points',
        'attack_dice',
        'defence_dice',
        'movement_dice',
        'gold',
        'weapons',
        'armor',
        'artifacts',
        'potions',
        'inventory',
    ];

    public function lobby()
    {
        return $this->belongsTo(Lobby::class);
    }

    public function getTotalAttackAttribute() {
        $weapon = $this->items()
        ->where('type', 'weapon')
        ->wherePivot('is_equipped', true)
        ->first();

        $value = $weapon ? $weapon->attack_bonus : $this->attack_dice;
        return max($value, 1);
    }

    public function getTotalDefenceAttribute() {
        $armorBonus = $this->items()
        ->wherePivot('is_equipped', true)
        ->sum('defence_bonus');

        $value = $this->defence_dice + $armorBonus;
        return max($value, 2);
    }

    // Das Maximum, das nicht überschritten werden darf
    public function getMaxBodyAttribute() {
        return $this->base_body_points + $this->body_mod;
    }

    public function getBodyPercentageAttribute()
    {
        $max = $this->max_body;
        return $max > 0 ? ($this->body_points / $max) * 100 : 0;
    }

    public function getMaxMindAttribute() {
        return $this->base_mind_points + $this->mind_mod;
    }

    public function getMindPercentageAttribute()
    {
        $max = $this->max_mind;
        return $max > 0 ? ($this->mind_points / $max) * 100 : 0;
    }

    public function items() {
        return $this->belongsToMany(Item::class, 'character_item')->withPivot('is_equipped', 'id');
    }

    public function equipped($type) {
        $equippedType = $type !== 'weapon' ? 'sub_type' : 'type'; 
        return $this->items()->wherePivot('is_equipped', true)->where($equippedType, $type)->first();
    }

}
