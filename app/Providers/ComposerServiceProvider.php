<?php

namespace App\Providers;

use App\Http\Controllers\App\Http\Controllers\Frontend\ViewComposers;
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
        view()->composer(['frontend.layouts.app'], 'App\Http\Controllers\Frontend\ViewComposers@setTokenElement');
        view()->composer(['frontend.layouts.app'], 'App\Http\Controllers\Frontend\ViewComposers@getIsAdmin');

        view()->composer([
            'frontend.partials.home._categories_side_menu',
            'frontend.partials.forms._create-item',
            'frontend.partials.forms._edit-item',
            'frontend.partials.forms._create-item-product-and-service',
            'frontend.partials.forms._edit-item-product-and-service'
        ], 'App\Http\Controllers\Frontend\ViewComposers@getCategories');

        view()->composer(['frontend.partials.forms._register',
            'frontend.partials.forms._user-edit',
            'frontend.partials.forms._create-qualification',
            'frontend.partials.forms._edit-qualification',
            'frontend.partials.forms._create-agency',
            'frontend.partials.forms._edit-agency',
        ], 'App\Http\Controllers\Frontend\ViewComposers@getCountries');

        view()->composer(['frontend.layouts.app',
        ], 'App\Http\Controllers\Frontend\ViewComposers@getContactusInfo');

        view()->composer('frontend.partials._page_bar', 'App\Http\Controllers\Frontend\ViewComposers@getBreadCrumbs');

        view()->composer(['frontend.partials.nav._search-row',
            'frontend.partials.forms._register',
            'frontend.partials.forms._user-edit',
        ], 'App\Http\Controllers\Frontend\ViewComposers@getCompaniesRoles');
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
