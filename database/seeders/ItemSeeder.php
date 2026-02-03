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
                    'en-US' => 'Dagger',
                    'de-DE' => 'Dolch',
                ], 
                'description' => [
                    'en-US' => 'A sharp knife. Can be thrown at any monster you can see but is lost once thrown.',
                    'de-DE' => 'Ein scharfes Messer. Kann nach jedem Monster geworfen werden, das man sieht, geht aber nach dem Wurf verloren.',
                ],
                'type' => 'weapon',
                'gold_value' => 25,
                'attack_bonus' => 1
            ],
            [
                'name' => [
                    'en-US' => 'Shortsword',
                    'de-DE' => 'Kurzschwert',
                ],
                'description' => [
                    'en-US' => 'Gives you the attack strength of 2 combat dice.',
                    'de-DE' => 'Verleiht dir die Angriffsstärke von 2 Kampfwürfeln.',
                ],
                'type' => 'weapon',
                'gold_value' => 150,
                'attack_bonus' => 2
            ],
            [
                'name' => [
                    'en-US' => 'Hand Axe',
                    'de-DE' => 'Handbeil',
                ],
                'description' => [
                    'en-US' => 'Can be thrown at any monster in your line of sight but is lost once thrown.',
                    'de-DE' => 'Kann auf jedes Monster in Sichtweite geworfen werden, geht aber nach dem Wurf verloren.',
                ],
                'type' => 'weapon',
                'gold_value' => 200,
                'attack_bonus' => 2
            ],
            [
                'name' => [
                    'en-US' => 'Rapier',
                    'de-DE' => 'Rapier',
                ],
                'description' => [
                    'en-US' => 'A light and fast sword that rewards precision.',
                    'de-DE' => 'Ein leichtes und schnelles Schwert, das Präzision belohnt.',
                ],
                'type' => 'weapon',
                'gold_value' => 250,
                'attack_bonus' => 2
            ],
            [
                'name' => [
                    'en-US' => 'Broadsword',
                    'de-DE' => 'Breitschwert',
                ],
                'description' => [
                    'en-US' => 'This wide blade gives you the attack strength of 3 combat dice.',
                    'de-DE' => 'Diese breite Klinge verleiht dir die Angriffsstärke von 3 Kampfwürfeln.',
                ],
                'type' => 'weapon',
                'gold_value' => 250,
                'attack_bonus' => 3
            ],
            [
                'name' => [
                    'en-US' => 'Longsword',
                    'de-DE' => 'Langschwert',
                ],
                'description' => [
                    'en-US' => 'Because of its length, this blade enables you to attack diagonally.',
                    'de-DE' => 'Aufgrund ihrer Länge ermöglicht diese Klinge diagonale Angriffe.',
                ],
                'type' => 'weapon',
                'gold_value' => 350,
                'attack_bonus' => 3
            ],
            [
                'name' => [
                    'en-US' => 'Battle Axe',
                    'de-DE' => 'Streitaxt',
                ],
                'description' => [
                    'en-US' => 'A heavy, double-edged axe. You may not use a shield when using this weapon.',
                    'de-DE' => 'Eine schwere, zweischneidige Axt. Beim Einsatz dieser Waffe darf kein Schild verwendet werden.',
                ],
                'type' => 'weapon',
                'gold_value' => 450,
                'attack_bonus' => 4
            ],
            [
                'name' => [
                    'en-US' => 'Staff',
                    'de-DE' => 'Stab',
                ],
                'description' => [
                    'en-US' => 'Enables you to attack diagonally. You may not use a shield when using this weapon.',
                    'de-DE' => 'Ermöglicht diagonale Angriffe. Die Verwendung eines Schildes ist bei dieser Waffe nicht erlaubt.',
                ],
                'type' => 'weapon',
                'gold_value' => 100,
                'attack_bonus' => 1
            ],
            [
                'name' => [
                    'en-US' => 'Crossbow',
                    'de-DE' => 'Armbrust',
                ],
                'description' => [
                    'en-US' => 'Unlimited arrows. You cannot fire at a monster that is adjacent to you.',
                    'de-DE' => 'Unbegrenzte Pfeile. Du kannst nicht auf ein Monster schießen, das sich neben dir befindet.',
                ],
                'type' => 'weapon',
                'gold_value' => 350,
                'attack_bonus' => 3
            ],
            [
                'name' => [
                    'en-US' => 'Wand',
                    'de-DE' => 'Zauberstab',
                ],
                'description' => [
                    'en-US' => 'A magical wand that can attack diagonally and at range.',
                    'de-DE' => 'Ein magischer Zauberstab, der diagonal und aus der Ferne angreifen kann.',
                ],
                'type' => 'weapon',
                'gold_value' => 125,
                'attack_bonus' => 2
            ],
            [
                'name' => [
                    'en-US' => 'Spear',
                    'de-DE' => 'Speer',
                ],
                'description' => [
                    'en-US' => 'A long weapon that allows you to attack diagonally. You may not use a shield when using this weapon.',
                    'de-DE' => 'Eine lange Waffe, mit der man diagonal angreifen kann. Beim Einsatz dieser Waffe darf kein Schild verwendet werden.',
                ],
                'type' => 'weapon',
                'gold_value' => 150,
                'attack_bonus' => 2
            ],


            // Armor
            [
                'name' => [
                    'en-US' => 'Helmet',
                    'de-DE' => 'Helm',
                ],
                'description' => [
                    'en-US' => 'This protective metal headpiece gives you 1 extra Defend die.',
                    'de-DE' => 'Dieser schützende Metallkopfschutz gibt dir 1 zusätzlichen Verteidigungswürfel.',
                ],
                'type' => 'armor',
                'sub_type' => 'helmet',
                'gold_value' => 125,
                'defence_bonus' => 1
            ],
            [
                'name' => [
                    'en-US' => 'Shield',
                    'de-DE' => 'Schild',
                ],
                'description' => [
                    'en-US' => 'Gives you 1 extra Defend die. May not be used with the battle axe or the staff.',
                    'de-DE' => 'Gewährt dir 1 zusätzlichen Verteidigungswürfel. Kann nicht mit der Streitaxt oder dem Stab verwendet werden.',
                ],
                'type' => 'armor',
                'sub_type' => 'shield',
                'gold_value' => 150,
                'defence_bonus' => 1
            ],
            [
                'name' => [
                    'en-US' => 'Chain Mail',
                    'de-DE' => 'Kettenhemd',
                ],
                'description' => [
                    'en-US' => 'Light metal armor that gives you 1 extra Defend die. May be combined with helmet/shield.',
                    'de-DE' => 'Leichte Metallrüstung, die dir einen zusätzlichen Verteidigungswürfel gewährt. Kann mit Helm/Schild kombiniert werden.',
                ],
                'type' => 'armor',
                'sub_type' => 'armor',
                'gold_value' => 500,
                'defence_bonus' => 1
            ],
            [
                'name' => [
                    'en-US' => 'Plate Mail',
                    'de-DE' => 'Plattenpanzer',
                ],
                'description' => [
                    'en-US' => 'Heavy armor. You may only roll 1 red die for movement while wearing it.',
                    'de-DE' => 'Schwere Rüstung. Du darfst beim Tragen dieser Rüstung nur 1 roten Würfel für die Bewegung werfen.',
                ],
                'type' => 'armor',
                'sub_type' => 'armor',
                'gold_value' => 850,
                'defence_bonus' => 2
            ],
            [
                'name' => [
                    'en-US' => 'Bracers',
                    'de-DE' => 'Armschienen',
                ],
                'description' => [
                    'en-US' => 'Hardened leather bracers that give 1 extra Defend die. May be combined with helmet and/or shield.',
                    'de-DE' => 'Gehärtete Lederarmschienen, die einen zusätzlichen Verteidigungswürfel gewähren. Kann mit Helm und/oder Schild kombiniert werden.',
                ],
                'type' => 'armor',
                'sub_type' => 'armor',
                'gold_value' => 550,
                'defence_bonus' => 1
            ],

            // Items
            [
                'name' => [
                    'en-US' => 'Holy Water',
                    'de-DE' => 'Weihwasser',
                ],
                'description' => [
                    'en-US' => 'Use instead of attacking to instantly kill any one undead creature. Discard after use.',
                    'de-DE' => 'Verwende diese Fähigkeit anstelle eines Angriffs, um eine beliebige untote Kreatur sofort zu töten. Nach Gebrauch ablegen.',
                ],
                'type' => 'potion',
                'gold_value' => 400
            ],
            [
                'name' => [
                    'en-US' => 'Potion of Healing',
                    'de-DE' => 'Heiltrank',
                ],
                'description' => [
                    'en-US' => 'Restores up to 4 lost Body points.',
                    'de-DE' => 'Stellt bis zu 4 verlorene Körperpunkte wieder her.',
                ],
                'type' => 'potion',
                'gold_value' => 500
            ]
        ];

        foreach ($items as $item) {
            \App\Models\Item::updateOrCreate(
                ['name->de-DE' => $item['name']['de-DE']],
                $item
            );
        }
    }
}
