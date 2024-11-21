<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
class RepositoryServiceProvider extends ServiceProvider
{
    public function boot(): void
    {

    }

    public function register(): void
    {
//        $this->app->bind(IRepository::class, Repository::class);
    }

}
