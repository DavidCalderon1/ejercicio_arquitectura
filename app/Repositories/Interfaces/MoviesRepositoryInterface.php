<?php
namespace App\Repositories\Interfaces;

/**
 * Interface MoviesRepositoryInterface
 * @package App\Repositories\Interfaces
 */
interface MoviesRepositoryInterface
{
    /**
     * Retorna la lista de movies
     *
     * @param array $columns
     * @return array
     */
    public function listMovies(array $columns = ['*']): array;
}
