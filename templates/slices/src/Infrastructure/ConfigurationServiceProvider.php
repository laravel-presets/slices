<?php

namespace Infrastructure;

use Carbon\CarbonImmutable;
use Hybridly\Hybridly;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Console\CliDumper;
use Illuminate\Foundation\Http\HtmlDumper;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\ServiceProvider;

final class ConfigurationServiceProvider extends ServiceProvider
{
    public function boot(Hybridly $hybridly): void
    {
        $hybridly->loadLayoutsFrom(resource_path('layouts'), 'default');
    }

    public function register(): void
    {
        HtmlDumper::dontIncludeSource();
        CliDumper::dontIncludeSource();

        Model::shouldBeStrict();
        Model::unguard();
        Date::use(CarbonImmutable::class);
    }
}
