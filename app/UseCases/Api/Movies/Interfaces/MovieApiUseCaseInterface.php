<?php
namespace App\UseCases\Api\Movies\Interfaces;

interface MovieApiUseCaseInterface
{
    /**
     * Consulta los datos necesarios para la lista de movies
     *
     * @return string
     */
    public function handle(): string;
}
