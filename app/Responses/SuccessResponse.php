<?php

namespace App\Responses;

use Illuminate\Http\JsonResponse;

class SuccessResponse implements ResponseInterface
{
    /**
     * Return json response.
     * 
     * @param string|null $message
     * @param array|null $data
     * @param int $code
     * @return JsonResponse
     */
    public static function response(string|null $message, array|null $data, int $code): JsonResponse
    {
        return new JsonResponse(
            [
                'success' => true,
                'message' => $message,
                'data' => $data
            ],
            $code
        );
    }
}
