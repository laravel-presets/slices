<?php

namespace @@Namespace\Feature\Authentication;

use Illuminate\Routing\Router;
use Illuminate\Support\ServiceProvider;
use Infrastructure\Http\HttpServiceProvider;

final class AuthenticationServiceProvider extends ServiceProvider
{
    public const INDEX = 'index';
    public const NAMESPACE = 'authentication';

    public function boot(Router $router): void
    {
        $router
            ->middleware(HttpServiceProvider::WEB)
            ->withoutMiddleware(Authenticated::class)
            ->name(self::NAMESPACE . '.')
            ->group(__DIR__ . '/routes.php');
    }
}
