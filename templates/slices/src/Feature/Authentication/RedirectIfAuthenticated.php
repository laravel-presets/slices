<?php

namespace @@Namespace\Feature\Authentication;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

final readonly class RedirectIfAuthenticated
{
    public function handle(Request $request, Closure $next): Response
    {
        if (auth()->check()) {
            return to_route(AuthenticationServiceProvider::INDEX);
        }

        return $next($request);
    }
}
