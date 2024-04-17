<?php

namespace App\Providers;

use App\Http\Resources\ListResource;
use App\Http\Resources\TaskListResource;
use App\Http\Resources\TaskResource;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        ListResource::withoutWrapping();
        TaskResource::withoutWrapping();
        TaskListResource::withoutWrapping();
    }
}
