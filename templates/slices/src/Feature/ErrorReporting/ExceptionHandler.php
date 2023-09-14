<?php

namespace @@Namespace\Feature\ErrorReporting;

use Hybridly\Concerns\HandlesHybridExceptions;
use Hybridly\Contracts\HybridResponse;
use Illuminate\Foundation\Exceptions\Handler as BaseExceptionHandler;
use Illuminate\Http\Request;
// use Spatie\LaravelIgnition\Facades\Flare;
use Symfony\Component\HttpFoundation\Response;

final class ExceptionHandler extends BaseExceptionHandler
{
    use HandlesHybridExceptions;

    protected array $skipEnvironments = [];

    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    protected function renderHybridResponse(Response $response, Request $request, \Throwable $e): HybridResponse
    {
        return hybridly('error-reporting::error', [
            'status' => $response->getStatusCode(),
            'event_id' => '' // Flare::sentReports()->latestUuid(),
        ]);
    }
}
