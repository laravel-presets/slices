<?php

namespace @@Namespace\Feature\Authentication;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;

final class Authenticated extends Middleware
{
    /**
     * Gets the path the user should be redirected to when they are not authenticated.
     */
    protected function redirectTo(Request $request): ?string
    {
        return route('authentication.login');
    }
}
