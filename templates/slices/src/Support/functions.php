<?php

/**
 * Executes an invokable class.
 */
function invoke(callable|string $class, ...$parameters): mixed
{
    if (\is_string($class)) {
        return resolve($class)->__invoke(...$parameters);
    }

    return $class(...$parameters);
}
