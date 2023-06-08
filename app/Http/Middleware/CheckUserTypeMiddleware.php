<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\User;

class CheckUserTypeMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next, ...$types)
    {
        $userType = User::where('id', $request->user()->id)->value('tipo');
        
        if (!in_array($userType, $types)) {
            return response()->json(['error' => 'No tienes permiso para acceder a esta página.'], 403);
        }
        
        return $next($request);
    }
}
