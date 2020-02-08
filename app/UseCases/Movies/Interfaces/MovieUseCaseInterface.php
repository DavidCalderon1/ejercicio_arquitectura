<?php
namespace App\UseCases\Movies\Interfaces;

use App\UseCases\Movies\Exceptions\MovieUseCaseException;

interface MovieUseCaseInterface
{
    /**
     * Consulta los datos necesarios para la lista de movies
     *
     * @param array $columns
     * @return array
     */
    public function handle(array $columns = ['*']): array;
}
