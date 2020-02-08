<?php

namespace App\Repositories\Eloquent;

use App\Models\Movie;
use App\Repositories\Interfaces\MoviesRepositoryInterface;

/**
 * Class MoviesRepository
 * @package App\Repositories\Eloquent
 */
class MoviesRepository implements MoviesRepositoryInterface
{
    /**
     * @var Movie
     */
    protected $movie;

    /**
     * MoviesRepository constructor.
     * @param Movie $movie
     */
    public function __construct(Movie $movie)
    {
        $this->movie = $movie;
    }

    /**
     * @param array $columns
     * @return array
     */
    public function listMovies(array $columns = ['*']): array
    {
        $movie = $this->movie
            ->select($columns)
            ->get();

        return empty($movie) ? [] : $movie->toArray();
    }
}
