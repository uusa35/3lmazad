<?php

namespace App\Providers;

use App\Http\Controllers\App\Services\ViewComposers;
use Illuminate\Support\ServiceProvider;

class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Register bindings in the container.
     *
     * @return void
     */
    public function boot()
    {
        // frontend
        view()->composer('frontend.layouts.app', 'App\Services\ViewComposers@setTokenElement');
        view()->composer('frontend.layouts.app', 'App\Services\ViewComposers@getIsAdmin');
        view()->composer(['frontend.partials.nav._search-row', 'frontend.home', 'frontend.modules.ad.create'], 'App\Services\ViewComposers@getCategories');
        view()->composer(['frontend.partials.nav._search-row', 'frontend.modules.ad.create'], 'App\Services\ViewComposers@getFields');
        view()->composer('frontend.layouts.app', 'App\Services\ViewComposers@getAreas');
        view()->composer(['frontend.layouts.app', 'backend.layouts.app'], 'App\Services\ViewComposers@getContactusInfo');
        view()->composer(
            [
                'frontend.partials.forms._register',
                'frontend.partials.forms._user-edit',
            ], 'App\Services\ViewComposers@getCountries');

        view()->composer(
            [
                'frontend.partials.forms._register',
                'frontend.partials.forms._user-edit',
            ], 'App\Services\ViewComposers@getAreas');

        view()->composer(
            [
                'frontend.modules.user.index',
                'frontend.modules.ad.create'
            ], 'App\Services\ViewComposers@getAllAreas');

        //backend
        view()->composer('backend.partials.nav', 'App\Services\ViewComposers@getUser');
    }

    /**
     * automatically composer() method will be registered
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {

    }
}
