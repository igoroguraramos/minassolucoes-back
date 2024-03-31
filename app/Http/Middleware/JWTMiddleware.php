<?php

namespace App\Http\Middleware;

use Closure;
use Exception;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;
use Symfony\Component\HttpFoundation\Response;
use Tymon\JWTAuth\Exceptions\TokenExpiredException;
use Tymon\JWTAuth\Exceptions\TokenInvalidException;

class JWTMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        try {
            JWTAuth::parseToken()->authenticate();
        } catch (Exception $e) {
            $response = [];
            if ($e instanceof TokenInvalidException) {
               $response = ['error' => 'Token é inválido'];
            } elseif ($e instanceof TokenExpiredException) {
                $response = ['error' => 'Token está expirado'];
            } else {
                $response = ['error' => 'Token de Autorização não informado'];
            }

            return response($response, 401);
        }
        return $next($request);
    }
}
