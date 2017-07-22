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
                ->type('.search-input', strtok($ad->title, ' '))
                ->value('input[name=parent]',$category->id)
                ->press('Search')
                ->waitForText(strtok($ad->title,' '));
        });
    }

}
