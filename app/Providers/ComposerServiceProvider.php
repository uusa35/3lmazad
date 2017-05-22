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
        view()->composer(['frontend.layouts.app'], 'App\Services\ViewComposers@setTokenElement');
        view()->composer(['frontend.layouts.app'], 'App\Services\ViewComposers@getIsAdmin');

        view()->composer([
            'frontend.partials.home._categories_side_menu',
            'frontend.partials.forms._create-item',
            'frontend.partials.forms._edit-item',
            'frontend.partials.forms._create-item-product-and-service',
            'frontend.partials.forms._edit-item-product-and-service',
            'frontend.partials.nav._search-row',
        ], 'App\Services\ViewComposers@getCategories');

        view()->composer(
            [
                'frontend.partials.forms._register',
                'frontend.partials.forms._user-edit',
                'frontend.partials.nav._search-row'
            ], 'App\Services\ViewComposers@getCountries');

        view()->composer([
            'frontend.partials.nav._search-row'
        ], 'App\Services\ViewComposers@getAreas');

        view()->composer(['frontend.layouts.app',
            'backend.partials.nav',
        ], 'App\Services\ViewComposers@getContactusInfo');

        view()->composer('frontend.partials.components._icons_home_page', 'App\Services\ViewComposers@getOnHomePageCategories');

        view()->composer('frontend.partials._page_bar', 'App\Services\ViewComposers@getBreadCrumbs');
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
