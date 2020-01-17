<?php

namespace Todo\Todo;

use Illuminate\Database\Eloquent\Factory;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

class TodoServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        if (class_exists('Illuminate\Database\Eloquent\Factory') && class_exists('Faker\Factory')) { // not available without dev deps
            $this->app->make(Factory::class)->load(__DIR__ . '/Testing');
        }
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->map();
    }

    /**
     * Define the routes for the application.
     *
     * @return void
     */
    public function map()
    {
        $this->mapWebRoutes();
    }

    /**
     * Define the "web" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapWebRoutes()
    {
        Route::group([
            'prefix' => 'api/v1',
        ], function () {
            Route::group([
                'namespace' => 'Todo\Todo\Http\Controllers',
            ], function () {
                require __DIR__
                    . '/routes.php';
            });
        });
    }
}
