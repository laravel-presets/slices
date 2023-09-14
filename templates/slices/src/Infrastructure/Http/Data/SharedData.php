<?php

namespace @@Namespace\Infrastructure\Http\Data;

use Spatie\LaravelData\Data;

final class SharedData extends Data
{
    public function __construct(
        public readonly string $version,
    ) {
    }
}
