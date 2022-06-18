<?php

namespace App\Responses;

use Illuminate\Http\JsonResponse;

interface ResponseInterface
{
    public static function response(string|null $message, array|null $data, int $code): JsonResponse;
}
