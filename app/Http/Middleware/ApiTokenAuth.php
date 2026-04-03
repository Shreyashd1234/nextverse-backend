<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Symfony\Component\HttpFoundation\Response;

class ApiTokenAuth
{
    public function handle(Request $request, Closure $next): Response
    {
        $token = $request->bearerToken() ?: $request->header('X-Auth-Token');

        if (! $token) {
            return response()->json(['message' => 'Unauthenticated'], 401);
        }

        $userId = Cache::get('api_token:'.$token);
        if (! $userId) {
            return response()->json(['message' => 'Unauthenticated'], 401);
        }

        $user = User::find($userId);
        if (! $user) {
            Cache::forget('api_token:'.$token);

            return response()->json(['message' => 'Unauthenticated'], 401);
        }

        Auth::setUser($user);
        $request->setUserResolver(function () use ($user) {
            return $user;
        });
        $request->attributes->set('api_user', $user);
        $request->attributes->set('api_token', $token);

        return $next($request);
    }
}
