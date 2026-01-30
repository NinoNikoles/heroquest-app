<?php

namespace App\Http\Controllers;

use App\Models\HeroCharacter;
use App\Models\Lobby;
use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CharacterController extends Controller
{
    public function create(Lobby $lobby)
    {
        // Wir definieren die Standard-Stats der HeroQuest-Klassen
        $classes = [
            'Barbar' => ['hp' => 8, 'in' => 2, 'ad' => 1, 'dd' => 2, 'md' => 2],
            'Barbarin' => ['hp' => 8, 'in' => 2, 'ad' => 1, 'dd' => 2, 'md' => 2],
            'Zwerg'  => ['hp' => 7, 'in' => 3, 'ad' => 1, 'dd' => 2, 'md' => 2],
            'Zwergin'  => ['hp' => 7, 'in' => 3, 'ad' => 1, 'dd' => 2, 'md' => 2],
            'Elfe'    => ['hp' => 6, 'in' => 4, 'ad' => 1, 'dd' => 2, 'md' => 2],
            'Elf'    => ['hp' => 6, 'in' => 4, 'ad' => 1, 'dd' => 2, 'md' => 2],
            'Zauberer' => ['hp' => 4, 'in' => 6, 'ad' => 1, 'dd' => 2, 'md' => 2],
            'Zauberin' => ['hp' => 4, 'in' => 6, 'ad' => 1, 'dd' => 2, 'md' => 2],
        ];

        return view('characters.create', compact('lobby', 'classes'));
    }

    public function store(Request $request, Lobby $lobby)
    {
        // Hier speichern wir den gewählten Helden
        HeroCharacter::create([
            'user_id' => Auth::id(),
            'lobby_id' => $lobby->id,
            'name' => $request->name,
            'class' => $request->class,
            'base_body_points' => $request->body_points,
            'body_points' => $request->body_points,
            'base_mind_points' => $request->mind_points,
            'mind_points' => $request->mind_points,
            'attack_dice' => $request->attack_dice,
            'defence_dice' => $request->defence_dice,
            'movement_dice' => $request->movement_dice,
            'gold' => 0,
            'movement_dice' => 0,
            'weapons' => 0,
            'armor' => 0,
            'artifacts' => 0,
            'potions' => 0,
            'inventory' => 0,
        ]);

        return redirect()->route('lobbies.show', $lobby)->with('success', 'Held erstellt!');
    }

    public function show(HeroCharacter $character)
    {
        // Sicherheit: Nur der Besitzer oder Zargon (Lobby-Ersteller) darf das sehen
        if ($character->user_id !== Auth::id() && $character->lobby->zargon_id !== Auth::id()) {
            abort(403);
        }

        return view('characters.show', compact('character'));
    }

    public function updateStat(Request $request, HeroCharacter $character) {
        $stat = $request->stat;
        $change = $request->change;

        if($stat == 'gold') {
            $oldValue = $character->gold;
            $character->gold = max(0, $character->gold + $change);

            $character->save();
            return response()->json([
                'success' => true,
                'oldValue' => $oldValue, 
                'newValue' => $character->gold
            ]);
        } else {
            $baseField = 'base_' . $stat;
            $modField = str_replace('_points', '_mod', $stat);
            
            $limit = $character->$baseField + $character->$modField; // X + Y
            $character->$stat = max(0, min($character->$stat + $change, $limit));

            $character->save();
            return response()->json([
                'success' => true,
                'maxValue' => $character->$baseField + $character->$modField, 
                'newValue' => $character->$stat
            ]);
        }
    }

    public function updateModifier(Request $request, HeroCharacter $character)
    {
        $stat = $request->stat; // 'body_mod' oder 'mind_mod'
        $character->$stat += $request->change;

        // Z (Aktuell) prüfen: Darf nicht über neuem X + Y liegen
        $pointsField = str_replace('_mod', '_points', $stat);
        $baseField = 'base_' . $pointsField;
        if ($character->$stat < 0) {
            $character->$stat = 0;
        }
        $limit = $character->$baseField + $character->$stat;

        if ($character->$pointsField > $limit) {
            $character->$pointsField = $limit;
        }

        $character->save();
        return response()->json([
            'success' => true, 
            'newMod' => $character->$stat,
            'newCurrent' => $character->$pointsField,
            'newMax' => $limit
        ]);
    }

    // Item suchen und dem Inventar hinzufügen
    public function searchItems(Request $request) {
        $query = $request->query('query');
        
        $items = \App\Models\Item::where('name', 'LIKE', "%{$query}%")
            ->limit(8)
            ->get(['id', 'name', 'type', 'attack_bonus', 'defence_bonus', 'gold_value']); // gold_value ist dein Spaltenname für Gold
            
        return response()->json($items);
    }

    public function addSpecificItem(HeroCharacter $character, \App\Models\Item $item)
    {
        // Falls das Item Gold kostet, prüfen wir den Beutel
        // if ($character->gold < $item->gold_value) {
        //     return response()->json([
        //         'success' => false, 
        //         'message' => "Nicht genug Gold! Dir fehlen " . ($item->gold_value - $character->gold) . " G."
        //     ], 400);
        // }

        // Gold abziehen und Item hinzufügen
        // $character->gold -= $item->gold_value;
        $character->items()->attach($item->id);
        $character->save();

        // return response()->json([
        //     'success' => true,
        //     'message' => "{$item->name} für {$item->gold_value} G gekauft!"
        // ]);
        return response()->json([
            'success' => true,
            'message' => "{$item->name} hinzugefügt!"
        ]);
    }

    // Item aus dem Inventar anlegen
    public function equipItem(HeroCharacter $character, $pivotId)
    {
        // Das spezifische Item aus der Zwischentabelle holen
        $pivotItem = \DB::table('character_item')->where('id', $pivotId)->first();
        $item = \App\Models\Item::find($pivotItem->item_id);

        // Alle anderen Items des gleichen Typs (z.B. Waffen) ablegen
        if ($item->type === 'weapon') {
            $equippedIds = $character->items()
                ->where('type', $item->type)
                ->wherePivot('is_equipped', true)
                ->pluck('items.id');
        } else {
            $equippedIds = $character->items()
                ->where('sub_type', $item->sub_type)
                ->wherePivot('is_equipped', true)
                ->pluck('items.id');
        }

        foreach ($equippedIds as $id) {
            $character->items()->updateExistingPivot($id, ['is_equipped' => false]);
        }

        // Das neue Item ausrüsten
        $character->items()->updateExistingPivot($item->id, ['is_equipped' => true]);

        return back();
    }

    // Item ablegen (ist noch im Inventar, aber nicht mehr ausgerüstet)
    public function unequipItem(HeroCharacter $character, $pivotId)
    {
        $pivotItem = \DB::table('character_item')->where('id', $pivotId)->first();
        $character->items()->updateExistingPivot($pivotItem->item_id, ['is_equipped' => false]);
        return back();
    }

    // Item komplett zerstören/wegwerfen
    public function removeItem(HeroCharacter $character, $pivotId)
    {
        \DB::table('character_item')->where('id', $pivotId)->delete();
        return back();
    }
}