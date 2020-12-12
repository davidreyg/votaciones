<?php

namespace App\Providers;

use App\Models\User;
use App\Models\Product;
use App\Models\BillDetail;
use App\Models\Ingredient;
use App\Observers\ProductObserver;
use App\Observers\BillDetailObserver;
use App\Observers\IngredientObserver;
use Illuminate\Support\ServiceProvider;
use App\Console\Commands\ModelMakeCommand;
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
        if ($this->app->environment() !== 'production') {
            $this->app->register(\Barryvdh\LaravelIdeHelper\IdeHelperServiceProvider::class);
        }
        $this->app->extend('command.model.make', function ($command, $app) {
            return new ModelMakeCommand($app['files']);
        });
    }
}
