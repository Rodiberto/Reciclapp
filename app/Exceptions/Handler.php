<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;

class Handler extends ExceptionHandler
{
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    public function register(): void
    {
        $this->reportable(function (Throwable $e) {
            //
        });
    }




    public function render($request, Throwable $exception)
    {
        // Error 404
        if ($exception instanceof \Symfony\Component\HttpKernel\Exception\NotFoundHttpException) {
            return response()->view('errors.404', [], 404);
        }

        // Error 401
        if ($exception instanceof \Symfony\Component\HttpKernel\Exception\UnauthorizedHttpException) {
            return response()->view('errors.401', [], 401);
        }

        // Error 402
        if ($exception instanceof \Symfony\Component\HttpKernel\Exception\HttpException && $exception->getStatusCode() === 402) {
            return response()->view('errors.402', [], 402);
        }

        // Error 403
        if ($exception instanceof \Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException) {
            return response()->view('errors.403', [], 403);
        }

        // Error 419
        if ($exception instanceof \Illuminate\Session\TokenMismatchException) {
            return response()->view('errors.419', [], 419);
        }

        // Error 429
        if ($exception instanceof \Symfony\Component\HttpKernel\Exception\TooManyRequestsHttpException) {
            return response()->view('errors.429', [], 429);
        }

        // Error 500
        if ($exception instanceof \Symfony\Component\HttpKernel\Exception\HttpException && $exception->getStatusCode() === 500) {
            return response()->view('errors.500', [], 500);
        }

        // Error 503
        if ($exception instanceof \Symfony\Component\HttpKernel\Exception\ServiceUnavailableHttpException) {
            return response()->view('errors.503', [], 503);
        }

        return parent::render($request, $exception);
    }
}
