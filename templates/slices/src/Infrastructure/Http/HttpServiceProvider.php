<?php

namespace Infrastructure\Http;

use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

final class HttpServiceProvider extends ServiceProvider
{
    public const WEB = 'web';

    private array $web = [
        \Illuminate\Cookie\Middleware\EncryptCookies::class,
        \Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse::class,
        \Illuminate\Session\Middleware\StartSession::class,
        \Illuminate\Foundation\Http\Middleware\VerifyCsrfToken::class,
        \Infrastructure\Http\Middleware\HandleHybridRequests::class,
        \@@Namespace\Feature\Authentication\Authenticated::class,
    ];

    public function boot(): void
    {
        $this->middlewareGroup(self::WEB, $this->web);
    }
}
