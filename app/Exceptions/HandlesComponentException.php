<?php

namespace App\Exceptions;

use App\Exceptions\Handler as ExceptionHandler;

use App\Support\HandleJsonResponses;
use Illuminate\Contracts\Container\BindingResolutionException;
use Exception;
use Illuminate\Container\Container;
use Psy\Exception\FatalErrorException;
use Throwable;


trait HandlesComponentException
{
    use HandleJsonResponses;


    /**
     * Make API call with exception handling.
     * This allows to gracefully catch all possible exceptions and handle them properly.
     * @param $callback
     * @return mixed
     */
    protected function withErrorHandling($callback): mixed
    {
        try {
            return $callback();
        } catch (Exception) {
            return $this->message(__('An unexpected error occurred. Please try again later.'))
                ->respondBadRequest();
        }

    }

    /**
     * @param $callback
     * @return mixed
     * @throws BindingResolutionException
     */
    protected function withOverlapErrorHandling($callback): mixed
    {
        try {
            return $callback();
        } catch (OverlapException|Throwable $e) {
            return $this->handleComponentError($e);
        }

    }

	/**
	 * @param $callback
	 * @return mixed
	 */
	protected function withMessageErrorHandling($callback): mixed
	{
		try {
			return $callback();
		} catch (Exception $e) {
			return $this->message($e->getMessage())
				->respondBadRequest();
		}

	}

	/**
     * @param $e
     * @param $message
     * @param int $status
     * @return mixed
     * @throws BindingResolutionException
     */
    protected function handleComponentError($e, $message = null, int $status = 400): mixed
    {

        if ($e instanceof Throwable && !$e instanceof Exception) {
            $e = new FatalErrorException($e);
        }

        if (method_exists($e, 'getStatusCode') && $e->getStatusCode() !== null) {
            $status = $e->getStatusCode();
        }

        $this->exceptionHandler()->report($e);
        $message = $message ?? $e->getMessage();

        return $this->exceptionHandler()->respondError([], $message, $status);
    }


    /**
     * @return mixed|object
     * @throws BindingResolutionException
     */
    protected function exceptionHandler(): mixed
    {
        return Container::getInstance()->make(ExceptionHandler::class);
    }


}
