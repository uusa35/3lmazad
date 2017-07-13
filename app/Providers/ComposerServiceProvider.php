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
        view()->composer('frontend.layouts.app', 'App\Services\ViewComposers@setTokenElement');
        view()->composer('frontend.layouts.app', 'App\Services\ViewComposers@getIsAdmin');
        view()->composer(['frontend.partials.header','frontend.modules.ad.create'], 'App\Services\ViewComposers@getCategories');
        view()->composer('frontend.partials.components._icons_home_page', 'App\Services\ViewComposers@getOnHomePageCategories');
        view()->composer('frontend.layouts.app', 'App\Services\ViewComposers@getAreas');
        view()->composer(['frontend.layouts.app', 'backend.layouts.app'], 'App\Services\ViewComposers@getContactusInfo');
//        view()->composer('frontend.partials._page_bar', 'App\Services\ViewComposers@getBreadCrumbs');
        view()->composer(
            [
                'frontend.partials.forms._register',
                'frontend.partials.forms._user-edit',
            ], 'App\Services\ViewComposers@getCountries');
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
