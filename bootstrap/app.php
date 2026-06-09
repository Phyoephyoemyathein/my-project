<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        // ၁။ ဒီမှာ Proxy ကို အကုန်လုံး လက်ခံဖို့ ထည့်ပေးလိုက်ပါတယ်
        $middleware->trustProxies(at: '*');

        // ၂။ ကိုယ့်ရဲ့ မူရင်း admin middleware လေးလည်း ဒီအတိုင်း ရှိနေမှာဖြစ်ပါတယ်
        $middleware->alias([
            'admin' => \App\Http\Middleware\EnsureUserIsAdmin::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        //
    })->create();