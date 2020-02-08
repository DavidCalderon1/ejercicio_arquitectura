<?php

namespace App\Http\Controllers;

use App\UseCases\Movies\Interfaces\MovieUseCaseInterface;

class MovieController extends Controller
{
    /**
     * @var MovieUseCaseInterface
     */
    protected $movieUseCase;

    /**
     * MovieApiController constructor.
     * @param MovieUseCaseInterface $movieUseCase
     */
    public function __construct(MovieUseCaseInterface $movieUseCase)
    {
        $this->movieUseCase = $movieUseCase;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $result = $this->movieUseCase->handle();

        $viewWith = [];
        if (isset($result['message'])) {
            $viewWith['errors'] = $result['message'];
        }
        $viewWith['movies'] = $result;

        return view('movies.index')->with($viewWith);
    }
}
