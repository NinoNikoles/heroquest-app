<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class isInLobby
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $lobby = $request->route('lobby');
        $user = auth()->user();

        if ($lobby) {
            $isZargon = ($lobby->zargon_id === $user->id);

            $hasCharacterInLobby = $lobby->characters()->where('user_id', $user->id)->exists();

            if (!$isZargon && !$hasCharacterInLobby) {
                return redirect()->route('dashboard')
                    ->with('error', 'Du bist kein Teil dieser Quest-Gruppe!');
            }
        }

        return $next($request);
    }
}
