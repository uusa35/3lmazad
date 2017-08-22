<?php

namespace App\Providers;

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
        view()->composer([
            'frontend.partials.nav._search-row',
            'frontend.home', 'frontend.modules.ad.create',
            'frontend.home', 'frontend.modules.ad.edit',
            'frontend.partials.forms._register',
            'backend.modules.category.assign',
            'backend.modules.type.create',
            'backend.modules.type.edit',
            'backend.modules.brand.create',
            'backend.modules.brand.edit'
        ],
            'App\Services\ViewComposers@getCategories');

        view()->composer([
            'frontend.partials.forms._register',
            'frontend.modules.user.edit',
            'backend.modules.user.edit',
        ],
            'App\Services\ViewComposers@getGroups');
        view()->composer([
            'frontend.partials.nav._search-row',
            'frontend.modules.ad.create',
            'frontend.modules.ad.edit',
            'backend.modules.option.create',
            'backend.modules.option.edit',
            'backend.modules.color.create',
            'backend.modules.color.edit',
            'backend.modules.size.create',
            'backend.modules.size.edit',
            'backend.modules.category.assign',
        ],
            'App\Services\ViewComposers@getFields');

        view()->composer([
            'frontend.partials.components.search-form._area_id_field',
            'backend.modules.area.index',
            'backend.modules.user.create',
            'backend.modules.user.edit'
        ], 'App\Services\ViewComposers@getAreas');
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
                'frontend.modules.ad.create',
                'frontend.modules.ad.edit',
            ], 'App\Services\ViewComposers@getAllAreas');

        //backend
        view()->composer('backend.partials.nav', 'App\Services\ViewComposers@getUser');
        view()->composer([
            'backend.modules.field.create',
            'backend.modules.field.edit',
            'backend.modules.type.create',
            'backend.modules.type.edit',
            'backend.modules.category.create',
            'backend.modules.category.edit',
            'backend.modules.group.create',
            'backend.modules.group.edit',
        ],
            'App\Services\ViewComposers@getIcons');

        view()->composer([
            'backend.modules.field.create',
            'backend.modules.field.edit',
        ],
            'App\Services\ViewComposers@getFieldTypes');
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
