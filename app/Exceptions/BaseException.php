<?php

namespace App\Exceptions;

use Exception;
use Throwable;

abstract class BaseException extends Exception
{
    /**
     * The status code that will be used for JSON response representation of the exception.
     *
     */
    protected ?int $statusCode;

    /**
     * @param string $message
     * @param integer|null $statusCode
     * @param int $code
     * @param Throwable|null $previous
     */
    public function __construct(string $message = '', $statusCode = null, $code = 0, Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);

        $this->statusCode = $statusCode;
    }

    /**
     * @return int|null
     */
    public function getStatusCode(): ?int
    {
        return $this->statusCode;
    }
}
