<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LobbyController;
use App\Http\Controllers\CharacterController;
use App\Http\Middleware\characterBelongsTo;
use App\Http\Middleware\isInLobby;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [LobbyController::class, 'index'])
    ->name('dashboard');

    Route::get('/lobby/{lobby:code}', [LobbyController::class, 'show'])
        ->name('lobbies.show')
        ->middleware(isInLobby::class);

    // Charakter erstellen Seite
    Route::get('/lobby/{lobby}/character/create', [CharacterController::class, 'create'])
        ->name('characters.create');

    Route::post('/lobby/{lobby}/character', [CharacterController::class, 'store'])
        ->name('characters.store');

    Route::get('/character/{character}', [CharacterController::class, 'show'])
        ->name('characters.show')
        ->middleware(characterBelongsTo::class);

    Route::post('/character/{character}/update-modifier', [CharacterController::class, 'updateModifier'])
        ->name('characters.updateModifier');

    Route::post('/character/{character}/update-stat', [App\Http\Controllers\CharacterController::class, 'updateStat'])
        ->name('characters.updateStat');

    Route::post('/character/{character}/update-gold', [App\Http\Controllers\CharacterController::class, 'updateGold'])
        ->name('characters.updateGold');

    Route::post('/character/{character}/add-item', [CharacterController::class, 'addItem'])
        ->name('characters.addItem');

    Route::get('/items/search-api', [CharacterController::class, 'searchItems']);
    Route::post('/character/{character}/add-specific-item/{item}', [CharacterController::class, 'addSpecificItem'])
        ->name('items.addSpecific'); 

    Route::prefix('character/{character}')->group(function () {
        Route::post('/item-equip/{pivotId}', [App\Http\Controllers\CharacterController::class, 'equipItem'])
            ->name('items.equip');

        Route::post('/item-unequip/{pivotId}', [App\Http\Controllers\CharacterController::class, 'unequipItem'])
            ->name('items.unequip');

        Route::post('/item-remove/{pivotId}', [App\Http\Controllers\CharacterController::class, 'removeItem'])
            ->name('items.remove');
    });

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::post('/lobbies', [LobbyController::class, 'store'])->name('lobbies.store');
    Route::post('/lobbies/join', [LobbyController::class, 'join'])->name('lobbies.join');
    
});

require __DIR__.'/auth.php';
