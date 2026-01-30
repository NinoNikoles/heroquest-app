<?php

namespace App\Http\Controllers;

use App\Models\Lobby;
use App\Models\HeroCharacter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LobbyController extends Controller
{
    // Zeigt die Übersicht aller Lobbies des Users
    public function index() 
    {
        $user = Auth::user();

        $myCreatedLobbies = \App\Models\Lobby::where('zargon_id', $user->id)->get();

        $joinedLobbies = \App\Models\Lobby::whereHas('characters', function ($query) use ($user) {
            $query->where('user_id', $user->id);
        })->where('zargon_id', '!=', $user->id)->get();

        return view('dashboard', compact('myCreatedLobbies', 'joinedLobbies'));
    }

    // Speichert eine neue Lobby
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        Lobby::create([
            'name' => $request->name,
            'zargon_id' => Auth::id(),
        ]);

        return redirect()->back()->with('success', 'Lobby erfolgreich erstellt!');
    }

    public function join(Request $request)
    {
        $request->validate([
            'code' => 'required|string',
        ]);

        // Suche die Lobby mit diesem Code
        $lobby = Lobby::where('code', strtoupper($request->code))->first();

        if (!$lobby) {
            return redirect()->back()->withErrors(['code' => 'Dieser Code existiert nicht, Abenteurer!']);
        }

        // Wenn gefunden, leiten wir zur Charaktererstellung für diese Lobby weiter
        return redirect()->route('characters.create', ['lobby' => $lobby->code]);
    }

    public function show(Lobby $lobby)
    {
        // Lädt die Lobby inklusive aller zugehörigen Charaktere
        $characters = HeroCharacter::where('lobby_id', $lobby->id)->get();
        return view('lobbies.show', compact('lobby', 'characters'));
    }
}
