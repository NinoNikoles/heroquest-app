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

            // Weapons
            [
                'name' => [
                    'en' => 'Dagger',
                    'de' => 'Dolch',
                ], 
                'description' => [
                    'en' => 'A sharp knife. Can be thrown at any monster you can see but is lost once thrown.',
                    'de' => 'Ein scharfes Messer. Kann nach jedem Monster geworfen werden, das man sieht, geht aber nach dem Wurf verloren.',
                ],
                'type' => 'weapon',
                'gold_value' => 25,
                'attack_bonus' => 1
            ],
            [
                'name' => [
                    'en' => 'Shortsword',
                    'de' => 'Kurzschwert',
                ],
                'description' => [
                    'en' => 'Gives you the attack strength of 2 combat dice.',
                    'de' => 'Verleiht dir die Angriffsstärke von 2 Kampfwürfeln.',
                ],
                'type' => 'weapon',
                'gold_value' => 150,
                'attack_bonus' => 2
            ],
            [
                'name' => [
                    'en' => 'Hand Axe',
                    'de' => 'Handbeil',
                ],
                'description' => [
                    'en' => 'Can be thrown at any monster in your line of sight but is lost once thrown.',
                    'de' => 'Kann auf jedes Monster in Sichtweite geworfen werden, geht aber nach dem Wurf verloren.',
                ],
                'type' => 'weapon',
                'gold_value' => 200,
                'attack_bonus' => 2
            ],
            [
                'name' => [
                    'en' => 'Rapier',
                    'de' => 'Rapier',
                ],
                'description' => [
                    'en' => 'A light and fast sword that rewards precision.',
                    'de' => 'Ein leichtes und schnelles Schwert, das Präzision belohnt.',
                ],
                'type' => 'weapon',
                'gold_value' => 250,
                'attack_bonus' => 2
            ],
            [
                'name' => [
                    'en' => 'Broadsword',
                    'de' => 'Breitschwert',
                ],
                'description' => [
                    'en' => 'This wide blade gives you the attack strength of 3 combat dice.',
                    'de' => 'Diese breite Klinge verleiht dir die Angriffsstärke von 3 Kampfwürfeln.',
                ],
                'type' => 'weapon',
                'gold_value' => 250,
                'attack_bonus' => 3
            ],
            [
                'name' => [
                    'en' => 'Longsword',
                    'de' => 'Langschwert',
                ],
                'description' => [
                    'en' => 'Because of its length, this blade enables you to attack diagonally.',
                    'de' => 'Aufgrund ihrer Länge ermöglicht diese Klinge diagonale Angriffe.',
                ],
                'type' => 'weapon',
                'gold_value' => 350,
                'attack_bonus' => 3
            ],
            [
                'name' => [
                    'en' => 'Battle Axe',
                    'de' => 'Streitaxt',
                ],
                'description' => [
                    'en' => 'A heavy, double-edged axe. You may not use a shield when using this weapon.',
                    'de' => 'Eine schwere, zweischneidige Axt. Beim Einsatz dieser Waffe darf kein Schild verwendet werden.',
                ],
                'type' => 'weapon',
                'gold_value' => 450,
                'attack_bonus' => 4
            ],
            [
                'name' => [
                    'en' => 'Staff',
                    'de' => 'Stab',
                ],
                'description' => [
                    'en' => 'Enables you to attack diagonally. You may not use a shield when using this weapon.',
                    'de' => 'Ermöglicht diagonale Angriffe. Die Verwendung eines Schildes ist bei dieser Waffe nicht erlaubt.',
                ],
                'type' => 'weapon',
                'gold_value' => 100,
                'attack_bonus' => 1
            ],
            [
                'name' => [
                    'en' => 'Crossbow',
                    'de' => 'Armbrust',
                ],
                'description' => [
                    'en' => 'Unlimited arrows. You cannot fire at a monster that is adjacent to you.',
                    'de' => 'Unbegrenzte Pfeile. Du kannst nicht auf ein Monster schießen, das sich neben dir befindet.',
                ],
                'type' => 'weapon',
                'gold_value' => 350,
                'attack_bonus' => 3
            ],
            [
                'name' => [
                    'en' => 'Wand',
                    'de' => 'Zauberstab',
                ],
                'description' => [
                    'en' => 'A magical wand that can attack diagonally and at range.',
                    'de' => 'Ein magischer Zauberstab, der diagonal und aus der Ferne angreifen kann.',
                ],
                'type' => 'weapon',
                'gold_value' => 125,
                'attack_bonus' => 2
            ],
            [
                'name' => [
                    'en' => 'Spear',
                    'de' => 'Speer',
                ],
                'description' => [
                    'en' => 'A long weapon that allows you to attack diagonally. You may not use a shield when using this weapon.',
                    'de' => 'Eine lange Waffe, mit der man diagonal angreifen kann. Beim Einsatz dieser Waffe darf kein Schild verwendet werden.',
                ],
                'type' => 'weapon',
                'gold_value' => 150,
                'attack_bonus' => 2
            ],


            // Armor
            [
                'name' => [
                    'en' => 'Helmet',
                    'de' => 'Helm',
                ],
                'description' => [
                    'en' => 'This protective metal headpiece gives you 1 extra Defend die.',
                    'de' => 'Dieser schützende Metallkopfschutz gibt dir 1 zusätzlichen Verteidigungswürfel.',
                ],
                'type' => 'armor',
                'sub_type' => 'helmet',
                'gold_value' => 125,
                'defence_bonus' => 1
            ],
            [
                'name' => [
                    'en' => 'Shield',
                    'de' => 'Schild',
                ],
                'description' => [
                    'en' => 'Gives you 1 extra Defend die. May not be used with the battle axe or the staff.',
                    'de' => 'Gewährt dir 1 zusätzlichen Verteidigungswürfel. Kann nicht mit der Streitaxt oder dem Stab verwendet werden.',
                ],
                'type' => 'armor',
                'sub_type' => 'shield',
                'gold_value' => 150,
                'defence_bonus' => 1
            ],
            [
                'name' => [
                    'en' => 'Chain Mail',
                    'de' => 'Kettenhemd',
                ],
                'description' => [
                    'en' => 'Light metal armor that gives you 1 extra Defend die. May be combined with helmet/shield.',
                    'de' => 'Leichte Metallrüstung, die dir einen zusätzlichen Verteidigungswürfel gewährt. Kann mit Helm/Schild kombiniert werden.',
                ],
                'type' => 'armor',
                'sub_type' => 'armor',
                'gold_value' => 500,
                'defence_bonus' => 1
            ],
            [
                'name' => [
                    'en' => 'Plate Mail',
                    'de' => 'Plattenpanzer',
                ],
                'description' => [
                    'en' => 'Heavy armor. You may only roll 1 red die for movement while wearing it.',
                    'de' => 'Schwere Rüstung. Du darfst beim Tragen dieser Rüstung nur 1 roten Würfel für die Bewegung werfen.',
                ],
                'type' => 'armor',
                'sub_type' => 'armor',
                'gold_value' => 850,
                'defence_bonus' => 2
            ],
            [
                'name' => [
                    'en' => 'Bracers',
                    'de' => 'Armschienen',
                ],
                'description' => [
                    'en' => 'Hardened leather bracers that give 1 extra Defend die. May be combined with helmet and/or shield.',
                    'de' => 'Gehärtete Lederarmschienen, die einen zusätzlichen Verteidigungswürfel gewähren. Kann mit Helm und/oder Schild kombiniert werden.',
                ],
                'type' => 'armor',
                'sub_type' => 'armor',
                'gold_value' => 550,
                'defence_bonus' => 1
            ],

            // Items
            [
                'name' => [
                    'en' => 'Holy Water',
                    'de' => 'Weihwasser',
                ],
                'description' => [
                    'en' => 'Use instead of attacking to instantly kill any one undead creature. Discard after use.',
                    'de' => 'Verwende diese Fähigkeit anstelle eines Angriffs, um eine beliebige untote Kreatur sofort zu töten. Nach Gebrauch ablegen.',
                ],
                'type' => 'potion',
                'gold_value' => 400
            ],
            [
                'name' => [
                    'en' => 'Potion of Healing',
                    'de' => 'Heiltrank',
                ],
                'description' => [
                    'en' => 'Restores up to 4 lost Body points.',
                    'de' => 'Stellt bis zu 4 verlorene Körperpunkte wieder her.',
                ],
                'type' => 'potion',
                'gold_value' => 500
            ]
        ];

        foreach ($items as $item) {
            \App\Models\Item::updateOrCreate(
                ['name->de' => $item['name']['de']],
                $item
            );
        }
    }
}
