<?php

namespace Infrastructure\Http\Middleware;

use @@Namespace\Infrastructure\Http\Data\SharedData;
use Hybridly\Http\Middleware;

final class HandleHybridRequests extends Middleware
{
    public function share(): SharedData
    {
        return new SharedData(
            version: $this->getVersion(),
        );
    }

    private function getVersion(): string
    {
        return PHP_VERSION;
    }
}
