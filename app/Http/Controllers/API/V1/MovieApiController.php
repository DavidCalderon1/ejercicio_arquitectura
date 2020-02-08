<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\UseCases\Api\Movies\Interfaces\MovieApiUseCaseInterface;

class MovieApiController extends Controller
{
    /**
     * @var MovieApiUseCaseInterface
     */
    protected $movieUseCase;

    /**
     * MovieApiController constructor.
     * @param MovieApiUseCaseInterface $movieUseCase
     */
    public function __construct(MovieApiUseCaseInterface $movieUseCase)
    {
        $this->movieUseCase = $movieUseCase;
    }

    /**
     * Display a listing of the resource.
     */
    public function listMovies()
    {
        $result = $this->movieUseCase->handle();

        if (isset($result['message'])) {
            return responseJson($result['message'], $result['status']);
        }

        return $result;
    }
}
