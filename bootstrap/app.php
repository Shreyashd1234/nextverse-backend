<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Http\Middleware\HandleCors as LaravelHandleCors;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Session\TokenMismatchException;
use Symfony\Component\HttpFoundation\Response;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        api: __DIR__.'/../routes/api.php',
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        // Render sits behind a proxy/load balancer, so trust forwarded headers from all proxies.
        $middleware->trustProxies(at: '*');

        // Keep compatibility with projects that expect Fruitcake while supporting Laravel's core HandleCors.
        $middleware->append(class_exists(\Fruitcake\Cors\HandleCors::class)
            ? \Fruitcake\Cors\HandleCors::class
            : LaravelHandleCors::class);

        $middleware->statefulApi();
        $middleware->alias([
            'role' => \App\Http\Middleware\CheckRole::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        $exceptions->render(function (TokenMismatchException $exception, $request) {
            if ($request->is('api/*') || $request->expectsJson()) {
                return response()->json([
                    'message' => 'Session expired. Please login again.',
                ], Response::HTTP_UNPROCESSABLE_ENTITY);
            }

            return null;
        });

        $exceptions->render(function (AuthenticationException $exception, $request) {
            if ($request->is('api/*') || $request->expectsJson()) {
                return response()->json([
                    'message' => 'Session expired. Please login again.',
                ], Response::HTTP_UNAUTHORIZED);
            }

            return null;
        });
    })->create();
