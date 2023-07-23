<?php

namespace App\Helpers;

use App\Enums\Response;

class ResponseJson
{
    /**
     * Method to return common success response
     *
     * @param string $dataResponse
     * @return $\Illuminate\Http\Response
     */
    public static function success($dataResponse = null)
    {
        if ($dataResponse == null) {
            return response()->make("", 204);
        }else{
            $httpCode = Response::HTTP_OK;
        }

        return response()->json($dataResponse, $httpCode);
    }

    /**
     * Method to return common error response
     *
     * @param int $httpCode
     * @param string $message nullable
     * @return $\Illuminate\Http\Response
     */
    public static function error(int $httpCode, $message = null)
    {
        $statusCode = Response::fromValue($httpCode);
        $response = [
            'code' => $statusCode->getStatusCode(),
            'message' => Response::getDescription($httpCode),
        ];

        if($httpCode == Response::HTTP_UNPROCESSABLE_ENTITY || $message != null){
            $response['errors'] = $message;
        }

        return response()->json($response, $httpCode ?? Response::HTTP_UNPROCESSABLE_ENTITY);
    }
}
