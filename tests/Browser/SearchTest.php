<?php

namespace Tests\Browser;

use App\Models\Ad;
use App\Models\Category;
use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class SearchTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                ->assertSee('Laravel');
        });

    }

    /**
     * @group search-car
     */
    public function testSearchParentCars()
    {
        $carCategory = Category::where('name_en', 'vehicles')->first();
        $ad = Ad::where('category_id', $carCategory->children()->first()->id)->first();
        $this->browse(function (Browser $browser) use ($carCategory, $ad) {
            $browser->visit('/')
                ->assertInputValue('search', $ad->title)
                ->assertInputValue('search', $ad->title)
                i stopped here
                ->click('#categories', $carCategory->name_en)
                ->press('general.search')->stop();
        });
    }

    /**
     * @group search
     */
    public function testSearchSubCars()
    {
//        $subCarCategory = Category::where('name_en', 'vehicles')->first()->children()->first();
    }
}
