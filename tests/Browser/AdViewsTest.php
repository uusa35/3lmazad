<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class AdViewsTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     * @group ad.show
     */
    public function test_ad_show_page()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')->waitFor('.product-category')->click('.product-category')->assertRouteIs('ad.show')->assertSee('comments');
        });
    }
}
