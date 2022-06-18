<?php

namespace App\Exceptions;

use App\Responses\ErrorResponse;
use Exception;
use Throwable;

class ErrorException extends Exception
{
    private array|null $errors;

    public function __construct(string $message, array|null $errors, int $code, Throwable|null $previous = null)
    {
        $this->errors = $errors;

        parent::__construct($message, $code, $previous);
    }

    /**
     * Render response page
     * 
     * @return JsonResponse
     */
    public function render()
    {
        return ErrorResponse::response($this->message, $this->errors, $this->code);
    }
}
