<?php

namespace App\Providers;

use App\Models\User;
use App\Observers\UserObserver;
use Barryvdh\LaravelIdeHelper\IdeHelperServiceProvider;
use Fitztrev\QueryTracer\Providers\QueryTracerServiceProvider;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Laracasts\Generators\GeneratorsServiceProvider;
use Laravel\Dusk\DuskServiceProvider;
use Sven\ArtisanView\ArtisanViewServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        User::observe(UserObserver::class);
        Blade::directive('checkTrans', function ($element) {
            !emptyString(trans($element)) ? trans($element) : null;
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
//        if ($this->app->environment('local', 'seeding', 'testing')) {
            $this->app->register(IdeHelperServiceProvider::class);
            $this->app->register(GeneratorsServiceProvider::class);
            $this->app->register(ArtisanViewServiceProvider::class);
            $this->app->register(\Barryvdh\Debugbar\ServiceProvider::class);
            $this->app->register(DuskServiceProvider::class);
//        }
    }
}
