<?php

namespace Infrastructure;

final class GlobalServiceProviders
{
    public static function toArray(): array
    {
        return [
            \Infrastructure\EventServiceProvider::class,
            \Infrastructure\ConfigurationServiceProvider::class,
            // Feature providers here...
            \@@Namespace\Feature\Homepage\HomepageServiceProvider::class,
            \@@Namespace\Feature\Authentication\AuthenticationServiceProvider::class,
            \@@Namespace\Feature\ErrorReporting\ErrorReportingServiceProvider::class,
        ];
    }
}
