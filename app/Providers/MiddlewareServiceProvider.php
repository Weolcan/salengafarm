<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Middleware\UserMiddleware;

class MiddlewareServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->singleton(AdminMiddleware::class);
        $this->app->singleton(UserMiddleware::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        $this->app['router']->aliasMiddleware('admin', AdminMiddleware::class);
        $this->app['router']->aliasMiddleware('user', UserMiddleware::class);
    }
} 