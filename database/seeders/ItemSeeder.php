<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void {
        $items = [
            ['name' => 'Breitschwert', 'type' => 'weapon', 'attack_bonus' => 3],
            ['name' => 'Kurzschwert', 'type' => 'weapon', 'attack_bonus' => 2],
            ['name' => 'Handbeil', 'type' => 'weapon', 'attack_bonus' => 2],
            ['name' => 'Kampfstab', 'type' => 'weapon', 'attack_bonus' => 2],
            ['name' => 'Harnisch', 'type' => 'armor', 'defence_bonus' => 4],
            ['name' => 'Kettenhemd', 'type' => 'armor', 'defence_bonus' => 3],
            ['name' => 'Helm', 'type' => 'helm', 'defence_bonus' => 1],
            ['name' => 'Schild', 'type' => 'shield', 'defence_bonus' => 1],
            ['name' => 'Lederstiefel', 'type' => 'shoes', 'move_bonus' => 1],
            ['name' => 'Heiltrank', 'type' => 'potion', 'attack_bonus' => 0],
            ['name' => 'Antidot', 'type' => 'potion', 'attack_bonus' => 0],
            ['name' => 'Borins Rüstung', 'type' => 'artifact', 'defence_bonus' => 4],
            ['name' => 'Werkzeugset', 'type' => 'equipment', 'attack_bonus' => 0],
        ];

        foreach ($items as $item) {
            \App\Models\Item::updateOrCreate(['name' => $item['name']], $item);
        }
    }
}
