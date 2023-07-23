<?php

declare(strict_types=1);

namespace App\Enums;

use BenSampo\Enum\Enum;

final class Response extends Enum
{
    const HTTP_OK                           = 200;
    const HTTP_CREATED                      = 201;
    const HTTP_ACCEPTED                     = 202;
    const HTTP_NO_CONTENT                   = 204;
    const HTTP_BAD_REQUEST                  = 400;
    const HTTP_UNAUTHORIZED                 = 401;
    const HTTP_FORBIDDEN                    = 403;
    const HTTP_NOT_FOUND                    = 404;
    const HTTP_CONFLICT                     = 409;
    const HTTP_UNPROCESSABLE_ENTITY         = 422;
    const HTTP_RATE_LIMIT                   = 429;
    const HTTP_INTERNAL_SERVER_ERROR        = 500;
    const HTTP_SERVICE_UNAVAILABLE          = 503;

    // const statusCodes = [
    //     200 => 'SUCCESS',
    //     201 => 'CREATED',
    //     202 => 'ACCEPTED',
    //     204 => 'CONTENT',
    //     400 => 'BAD_REQUEST',
    //     401 => 'UNAUTHORIZED',
    //     403 => 'FORBIDDEN',
    //     404 => 'NOT_FOUND',
    //     409 => 'CONFLICT',
    //     422 => 'VALIDATION_ERROR',
    //     429 => 'RATE_LIMIT',
    //     500 => 'INTERNAL_SERVER_ERROR',
    //     503 => 'SERVICE_UNAVAILABLE',
    // ];

    // private $statusCode;

    // public function __construct(int $statusCode = 200, $message = null)
    // {
    //     $this->setStatusCode($statusCode, $message);
    // }

    // private function setStatusCode(int $statusCode)
    // {
    //     if (!$this->checkValidStatusCode()) {
    //         throw new \InvalidArgumentException(sprintf('The HTTP status code "%s" is inalid.', $statusCode));
    //     }

    //     $this->statusCode = self::statusCodes[$statusCode] ?? 'UNKNOWN_STATUS';
    // }

    // public function getStatusCode()
    // {
    //     return $this->statusCode;
    // }

    // /**
    //  * Checking valid status code
    //  * 
    //  * @return bool
    //  */
    // private function checkValidStatusCode(): bool
    // {
    //     $flag = in_array($this->statusCode, [
    //         self::HTTP_OK,
    //         self::HTTP_CREATED,
    //         self::HTTP_ACCEPTED,
    //         self::HTTP_NO_CONTENT,
    //         self::HTTP_BAD_REQUEST,
    //         self::HTTP_UNAUTHORIZED,
    //         self::HTTP_FORBIDDEN,
    //         self::HTTP_NOT_FOUND,
    //         self::HTTP_CONFLICT,
    //         self::HTTP_UNPROCESSABLE_ENTITY,
    //         self::HTTP_RATE_LIMIT,
    //         self::HTTP_INTERNAL_SERVER_ERROR,
    //         self::HTTP_SERVICE_UNAVAILABLE,
    //     ]);

    //     return $flag;
    // }
}
