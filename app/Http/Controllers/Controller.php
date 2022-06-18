<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Responses\ErrorResponse;
use App\Responses\SuccessResponse;
use Illuminate\Http\JsonResponse;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * Class of repository.
     * 
     * @var
     */
    protected $repository;

    /**
     * Return response.
     * 
     * @param string|null $message
     * @param array|null $data
     * @param int $code
     * @return JsonResponse
     */
    protected function errorResponse(string|null $message, array|null $data, int $code): JsonResponse
    {
        return ErrorResponse::response($message, $data, $code);
    }

    /**
     * Return response.
     * 
     * @param string|null $message
     * @param array|null $data
     * @param int $code
     * @return JsonResponse
     */
    protected function successResponse(string|null $message, array|null $data, int $code): JsonResponse
    {
        return SuccessResponse::response($message, $data, $code);
    }
}
