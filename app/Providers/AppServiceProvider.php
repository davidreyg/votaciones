<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Support\ServiceProvider;
use App\Console\Commands\ModelMakeCommand;
use App\Models\ElectionGroup;
use App\Models\Employee;
use App\Models\EmployeeGroup;
use App\Observers\ElectionGroupObserver;
use App\Observers\EmployeeGroupObserver;
use App\Observers\EmployeeObserver;
use App\Observers\UserObserver;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        User::observe(UserObserver::class);
        Employee::observe(EmployeeObserver::class);
        EmployeeGroup::observe(EmployeeGroupObserver::class);
        ElectionGroup::observe(ElectionGroupObserver::class);
        if ($this->app->environment() !== 'production') {
            $this->app->register(\Barryvdh\LaravelIdeHelper\IdeHelperServiceProvider::class);
        }
        $this->app->extend('command.model.make', function ($command, $app) {
            return new ModelMakeCommand($app['files']);
        });
    }
}
