<?php

namespace @@Namespace\Feature\Homepage;

use @@Namespace\Feature\Authentication\Authenticated;
use Hybridly\Hybridly;
use Illuminate\Routing\Router;
use Illuminate\Support\ServiceProvider;
use Infrastructure\Http\HttpServiceProvider;

final class HomepageServiceProvider extends ServiceProvider
{
    public const NAMESPACE = 'homepage';

    public function boot(Hybridly $hybridly, Router $router): void
    {
        $router
            ->middleware(HttpServiceProvider::WEB)
            ->withoutMiddleware(Authenticated::class)
            ->group(__DIR__ . '/routes.php');

        $hybridly->loadModuleFrom(__DIR__, self::NAMESPACE);
    }
}
