<?php

namespace App\Providers;

use App\Repositories\Eloquent\MoviesRepository;
use App\Repositories\Interfaces\MoviesRepositoryInterface;
use App\UseCases\Api\Movies\Interfaces\MovieApiUseCaseInterface;
use App\UseCases\Api\Movies\MovieApiUseCase;
use App\UseCases\Movies\Interfaces\MovieUseCaseInterface;
use App\UseCases\Movies\MovieUseCase;
use Illuminate\Support\ServiceProvider;

class BilboardServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        /**
         * WEB
         */

        $this->app->bind(MoviesRepositoryInterface::class, function () {
            return app(MoviesRepository::class);
        });

        /**
         * Lista de peliculas web
         */
        $this->app->bind(MovieUseCaseInterface::class, function () {
            return app(MovieUseCase::class);
        });

        $this->app->bind(MoviesRepositoryInterface::class, function () {
            return app(MoviesRepository::class);
        });

        /**
         * API
         */

        /**
         * Lista de peliculas API
         */
        $this->app->bind(MovieApiUseCaseInterface::class, function () {
            return app(MovieApiUseCase::class);
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
