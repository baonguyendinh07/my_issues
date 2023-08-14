<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;
use App\Enums\Response;
use App\Helpers\ResponseJson;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\HttpKernel\Exception\TooManyRequestsHttpException;
use Illuminate\Database\QueryException;

class Handler extends ExceptionHandler
{
    /**
     * The list of the inputs that are never flashed to the session on validation exceptions.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     */
    public function register(): void
    {
        $this->renderable(function (ValidationException $e){
            return ResponseJson::error(Response::HTTP_UNPROCESSABLE_ENTITY, $e->errors());
        });

        $this->renderable(function (NotFoundHttpException $e){
            return ResponseJson::error(Response::HTTP_NOT_FOUND);
        });

        $this->renderable(function (TooManyRequestsHttpException $e){
            return ResponseJson::error(Response::HTTP_RATE_LIMIT);
        });

        $this->renderable(function (QueryException $e){
            return ResponseJson::error(Response::HTTP_SERVICE_UNAVAILABLE, $e->getMessage());
        });
    }
}
