<?php

namespace @@Namespace\Feature\ErrorReporting;

use Hybridly\Hybridly;
use Illuminate\Support\ServiceProvider;

final class ErrorReportingServiceProvider extends ServiceProvider
{
    public const NAMESPACE = 'error-reporting';

    public function boot(Hybridly $hybridly): void
    {
        $hybridly->loadViewsFrom(__DIR__, self::NAMESPACE);
    }
}
