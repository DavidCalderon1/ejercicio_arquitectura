<?php
namespace App\UseCases\Movies;

use App\Repositories\Eloquent\MoviesRepository;
use App\UseCases\Movies\Exceptions\MovieUseCaseException;
use App\UseCases\Movies\Interfaces\MovieUseCaseInterface;

class MovieUseCase implements MovieUseCaseInterface
{
    /**
     * @var MoviesRepository
     */
    protected $moviesRepository;

    /**
     * MovieApiUseCase constructor.
     * @param MoviesRepository $moviesRepository
     */
    public function __construct(
        MoviesRepository $moviesRepository
    ) {
        $this->moviesRepository = $moviesRepository;
    }

    /**
     * Consulta los datos necesarios para la lista de movies
     *
     * @param array $columns
     * @return array
     * @throws MovieUseCaseException
     */
    public function handle(array $columns = ['*']): array
    {
        try {
            $moviesResult = $this->moviesRepository->listMovies($columns);

            if (empty($moviesResult)) {
                return internalResponse(404, trans('movies.movies_not_found'));
            }

            return $moviesResult;
        } catch (\Throwable $e) {
            throw new MovieUseCaseException($e->getMessage(), 500);
        }
    }
}
