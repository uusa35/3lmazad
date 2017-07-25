<?php

namespace Tests\Browser;

use App\Models\Ad;
use App\Models\Area;
use App\Models\Category;
use App\Models\User;
use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class SearchTest extends DuskTestCase
{
    /**
     * Get the element shortcuts for the page.
     *
     * @return array
     */
    public function elements()
    {
        return [
            '@catParent' => 'input[name=parent]',
        ];
    }

    /**
     * @group search-car
     */
    public function testSearchParentCars()
    {
        $category = Category::where('name_en', 'mobiles')->first();
        $ad = Ad::whereIn('category_id', $category->children->pluck('id'))->first();
        $this->browse(function (Browser $browser) use ($category, $ad) {
            $browser->visit('/')
                ->type('input[name=search]', strtok($ad->title, ' '))
                ->mouseover('#category')
                ->click('#category')
                ->mouseover('#cat-'.$category->id)
                ->click('#cat-'.$category->id)
                ->select('#category', $category->id)
                ->press('Search')
                ->pause(100000)
                ->waitForText(strtok($ad->title, ' '));
        });
    }

}
