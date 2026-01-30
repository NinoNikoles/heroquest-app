<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class characterBelongsTo
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $character = $request->route('character');

        if ($character && $character->user_id !== auth()->id()) {
            return redirect()->route('dashboard')->with('error', 'Nicht dein Held!');
        }

        return $next($request);
    }
}
