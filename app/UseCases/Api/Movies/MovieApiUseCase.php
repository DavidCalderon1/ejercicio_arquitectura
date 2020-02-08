<?php

namespace App\UseCases\Api\Movies;

use App\UseCases\Api\Movies\Exceptions\MovieApiUseCaseException;
use App\UseCases\Api\Movies\Interfaces\MovieApiUseCaseInterface;

class MovieApiUseCase implements MovieApiUseCaseInterface
{
    /**
     * Consulta los datos necesarios para la lista de movies
     *
     * @return string
     * @throws MovieApiUseCaseException
     */
    public function handle(): string
    {
        try {
            $moviesResult = file_get_contents(config('movies.url') . config('movies.key'));

            if (empty($moviesResult)) {
                return internalResponse(404, trans('movies.movies_not_found'));
            }

            return $moviesResult;
        } catch (\Throwable $e) {
            throw new MovieApiUseCaseException($e->getMessage(), 500);
        }
    }
}
