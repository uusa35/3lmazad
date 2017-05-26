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
        $category = Category::where('name_en', 'vehicles')->first();
        $ad = Ad::where('category_id', $category->children()->first()->id)->first();
        $this->browse(function (Browser $browser) use ($category, $ad) {
            $browser->visit('/')
                ->assertInputValue('search', $ad->title)
                ->assertInputValue('main', $category->id)
                ->press('general.search')
                i stopped here
                ->waitForText(str_limit($ad->title,50));
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
