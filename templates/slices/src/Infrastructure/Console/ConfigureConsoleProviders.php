<?php

namespace Infrastructure\Console;

use Illuminate\Config\Repository;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Support\DefaultProviders;
use Infrastructure\GlobalServiceProviders;

final class ConfigureConsoleProviders
{
    public function bootstrap(Application $app): void
    {
        $providers = (new DefaultProviders())
            ->merge([
                \Termwind\Laravel\TermwindServiceProvider::class,
                \Laravel\Tinker\TinkerServiceProvider::class,
            ])
            ->merge(GlobalServiceProviders::toArray())
            ->toArray();

        $app->get(Repository::class)
            ->set('app.providers', $providers);
    }
}
