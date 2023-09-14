<?php

namespace Infrastructure\Http;

use Illuminate\Config\Repository;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Support\DefaultProviders;
use Infrastructure\GlobalServiceProviders;

final readonly class ConfigureHttpProviders
{
    public function bootstrap(Application $app): void
    {
        $providers = (new DefaultProviders())
            ->merge([HttpServiceProvider::class])
            ->merge(GlobalServiceProviders::toArray())
            ->toArray();

        $app->get(Repository::class)
            ->set('app.providers', $providers);
    }
}
