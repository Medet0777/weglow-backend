<?php

namespace App\Providers;

use App\Contracts\Repositories\OtpRepositoryContract;
use App\Contracts\Repositories\UserRepositoryContract;
use App\Contracts\Services\AuthServiceContract;
use App\Repositories\OtpRepository;
use App\Repositories\UserRepository;
use App\Services\AuthService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(UserRepositoryContract::class, UserRepository::class);
        $this->app->bind(OtpRepositoryContract::class, OtpRepository::class);
        $this->app->bind(AuthServiceContract::class, AuthService::class);


        // Фасад Service
        $this->app->singleton('service', function ($app) {
            return new class($app) {
                protected $app;

                public function __construct($app)
                {
                    $this->app = $app;
                }
                public function auth()
                {
                    return $this->app->make(AuthServiceContract::class);
                }

            };
        });

        // Фасад Repository
        $this->app->singleton('repository', function ($app) {
            return new class($app) {
                protected $app;

                public function __construct($app)
                {
                    $this->app = $app;
                }

                public function user()
                {
                    return $this->app->make(UserRepositoryContract::class);
                }

                public function otp()
                {
                    return $this->app->make(OtpRepositoryContract::class);
                }
            };
        });

    }

    public function boot(): void
    {
    }
}
