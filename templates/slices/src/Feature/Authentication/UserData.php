<?php

namespace @@Namespace\Feature\Authentication;

use Spatie\LaravelData\Data;

final class UserData extends Data
{
    public function __construct(
        public readonly string $name,
        public readonly string $email,
    ) {
    }
}
