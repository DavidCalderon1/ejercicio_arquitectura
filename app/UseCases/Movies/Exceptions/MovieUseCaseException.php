<?php
namespace App\UseCases\Movies\Exceptions;

use Exception;

class MovieUseCaseException extends Exception
{
    /**
     * MovieApiUseCaseException constructor.
     * @param string $message
     * @param int $code
     * @param Throwable|null $previous
     */
    public function __construct($message = "", $code = 0, Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }

    /**
     * @return int
     */
    public function getHttpCode(): int
    {
        return $this->getCode();
    }

    /**
     * @return array
     */
    public function responseException(): array
    {
        return [
            'errors' => [
                [
                    "detail" => $this->getMessage(),
                    "status" => $this->getCode() ?? 400,
                    "title" => trans('shared.process_error')
                ]
            ]
        ];
    }
}
