<?php

namespace Tests\Browser;

use App\Models\Ad;
use App\Models\Area;
use App\Models\Category;
use App\Models\City;
use App\Models\Color;
use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class AdViewsTest extends DuskTestCase
{
    use DatabaseTransactions;

    /**
     * A Dusk test example.
     *
     * @return void
     * @group ad.show
     */
    public function test_ad_show_page()
    {
        $ad = Ad::orderBy('created_at', 'desc')->first();
        $this->browse(function (Browser $browser) use ($ad) {
            $browser->visit('/ad/' . $ad->id)
                ->assertRouteIs('ad.show', $ad->id)
                ->assertSee($ad->title);
        });
    }

    /**
     * @throws \Exception
     * @throws \Throwable
     * @group ad.create
     */
    public function test_create_ad()
    {

        $parent = Category::parents()->whereHas('fields', function ($q) {
            return $q->where('name', 'brand_id');
        })->first();
        $areaId = Area::all()->random()->id;
        $this->browse(function (Browser $browser) use ($parent, $areaId) {
            $browser->visit('/home')
                ->loginAs(User::find(1))
                ->visit('ad/create')
                ->waitFor('input[name=title]')
                ->type('input[name=title]', 'something')
                ->attach('image', '/Users/usamaahmed/Documents/logo.png')
                ->select('#category-create', $parent->id)
                ->waitFor('#subCategories-create')
                ->select('#subCategories-create', $parent->children()->first()->id)
                ->pause(10000000)
                ->waitFor('#input-create-brand_id')
                ->select('#input-create-brand_id', $parent->brands->random()->id)
                ->select('#input-create-color_id', Color::all()->random()->id)
                ->select('#input-create-size_id', Color::all()->random()->id)
                ->waitFor('input[name=manufacturing_year]')
                ->value('input[name=manufacturing_year]', '1999')
                ->select('#input-create-is_new', 1)
                ->select('#input-create-is_automatic', 1)
                ->value('input[name=mileage]', '1000')
                ->waitFor('#areas')
                ->select('#areas', $areaId)
                ->waitFor('#cities')
                ->select('#cities', City::where('area_id', $areaId)->get()->random()->id)
                ->attach('images[]', '/Users/usamaahmed/Documents/logo.png')
                ->type('input[name=price]', 200)
                ->type('input[name=mobile]', 234829384)
                ->waitFor('textarea[name=description]')
                ->type('textarea[name=description]', 'whatever')
                ->type('input[name=address]', 'this is test address')
                ->pause(1000000)
                ->press('general.submit');
        });
    }


    /**
     * @throws \Exception
     * @throws \Throwable
     * @group ad.edit
     */
    public function test_edit_ad()
    {
        $parent = Category::parents()->whereHas('fields', function ($q) {
            return $q->where('name', 'rent_type');
        })->first();
        $ad = Ad::where('user_id', '!=', null)->first();
        $this->browse(function (Browser $browser) use ($parent, $ad) {
            $browser->visit('/home')
                ->loginAs(User::whereId($ad->user_id)->first())
                ->visit('ad/' . $ad->id . '/edit')
                ->type('input[name=title]', 'something')
                ->attach('image', '/Users/usamaahmed/Documents/logo.jpg')
                ->attach('images[]', '/Users/usamaahmed/Documents/logo.jpg')
                ->type('textarea[name=description]', 'whatever')
                ->type('input[name=price]', 333)
                ->type('input[name=mobile]', 3333)
                ->select('#category-create', $parent->id)
                ->waitFor('#subCategories-create')
                ->select('#subCategories-create', $parent->children()->first()->id)
                ->waitForText('is_new')->waitForText('room_no')->waitForText('bathroom_no')->waitForText('space')
                ->select('#input-create-is_new', 1)
                ->select('#input-create-is_furnished', 1)
                ->select('#input-create-rent_type', 'daily')
                ->select('#input-create-room_no', 1)
                ->select('#input-create-bathroom_no', 1)
                ->select('#input-create-building_age', 1)
                ->type('#input-create-floor_no', 1)
                ->type('#input-create-space', 45)
                ->select('#area_id', Area::all()->random()->id)
                ->type('input[name=address]', 'this is test address')
                ->pause(1000000)
                ->press('general.submit');
        });
    }
}
