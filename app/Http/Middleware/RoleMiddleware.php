<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    /**
     * Manejar una solicitud entrante.
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Verificar si el usuario está autenticado
        if (!Auth::check()) {
            return redirect('/login')->withErrors(['access' => 'Debes iniciar sesión para acceder.']);
        }

        // Verificar si el usuario tiene el rol adecuado (fk_tipo_usuario = 1)
        if (Auth::user()->fk_tipo_usuario !== 1) {
            return redirect('/panel')->withErrors(['access' => 'No tienes permisos para acceder a esta página.']);
        }

        return $next($request);
    }
}
