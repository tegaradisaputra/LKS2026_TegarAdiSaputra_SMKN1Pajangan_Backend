<?php

namespace App\Providers;

use App\Repositories\ApplicationLogRepository;
use App\Repositories\BusinessVerificationRepository;
use App\Repositories\Contracts\ApplicationLogRepositoryInterface;
use App\Repositories\Contracts\BusinessVerificationRepositoryInterface;
use App\Repositories\Contracts\FinancingApplicationRepositoryInterface;
use App\Repositories\Contracts\InstallmentRepositoryInterface;
use App\Repositories\Contracts\UserRepositoryInterface;
use App\Repositories\FinancingApplicationRepository;
use App\Repositories\InstallmentRepository;
use App\Repositories\UserRepository;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
        $this->app->bind(UserRepositoryInterface::class, UserRepository::class);
        $this->app->bind(BusinessVerificationRepositoryInterface::class, BusinessVerificationRepository::class);
        $this->app->bind(FinancingApplicationRepositoryInterface::class, FinancingApplicationRepository::class);
        $this->app->bind(InstallmentRepositoryInterface::class, InstallmentRepository::class);
        $this->app->bind(ApplicationLogRepositoryInterface::class, ApplicationLogRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
