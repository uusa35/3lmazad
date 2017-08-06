<?php

namespace Tests\Browser;

use App\Models\Ad;
use App\Models\AdMeta;
use App\Models\Area;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Color;
use App\Models\Deal;
use App\Models\Size;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\DatabaseTransactions;
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
            '@search' => 'input[name=search]'
        ];
    }

    /**
     * @group search-parent
     */
    public function test_search_form_parent_category()
    {
        $category = Category::where('name_en', 'mobiles')->first();
        $ad = Ad::whereIn('category_id', $category->children->pluck('id'))->first();
        $this->browse(function (Browser $browser) use ($category, $ad) {
            $browser->visit('/')
                ->type('@search', strtok($ad->title, ' '))
                ->mouseover('#category')
                ->click('#category')
                ->mouseover('#cat-' . $category->id)
                ->click('#cat-' . $category->id)
                ->press('Search')
                ->waitForText(strtok($ad->title, ' '));
        });
    }

    /**
     * @throws \Exception
     * @throws \Throwable
     * @group search-sub
     */
    public function test_search_form_sub_categories_with_parents_that_have_field_brand_id()
    {
        $parent = Category::whereHas('fields', function ($q) {
            return $q->where('name', 'brand_id');
        })->first();
        $sub = Category::where('parent_id', $parent->id)->first();
        $ad = Ad::where('category_id', $sub->id)->inRandomOrder()->first();
        if ($ad) {
            $this->browse(function (Browser $browser) use ($ad, $parent) {
                $browser->visit('/')
                    ->type('input[name=search]', strtok($ad->title, ' '))
                    ->click('#category')
                    ->mouseover('#cat-' . $parent->id)
                    ->waitFor('#cat-' . $ad->category_id)
                    ->click('#cat-' . $ad->category_id)
                    ->waitFor('#brand_id')
                    ->value('input[name=brand_id]', $ad->brand_id)
                    ->press('Search')
                    ->waitForText(strtok($ad->title, ' '))
                    ->assertSee(strtok($ad->title, ' '));
            });
        }
    }

    /**
     * @group search-sub-different
     */
    public function test_search_form_sub_category_including_color_size_with_brand_model_elements()
    {
        $parent = Category::whereHas('fields', function ($q) {
            return $q->where(['name' => 'brand_id', 'name' => 'color_id', 'name' => 'size_id', 'name' => 'model_id']);
        })->first();
        $ad = factory(Ad::class)->create([
            'category_id' => $parent->children()->first()->id,
            'brand_id' => $parent->brands->first()->id,
            'model_id' => $parent->brands->first()->models->first()->id,
            'title' => 'Ahmed',
            'is_sold' => false
        ]);
        factory(AdMeta::class)->create(['ad_id' => $ad->id]);
        factory(Deal::class)->create(['end_date' => Carbon::now()->addDays(3), 'ad_id' => $ad->id]);
        factory(Deal::class)->create(['end_date' => Carbon::now()->subDays(1), 'ad_id' => $ad->id]);
        $this->browse(function (Browser $browser) use ($ad, $parent) {
            $browser->visit('/')
                ->type('input[name=search]', $ad->title)
                ->type('input[name=min]', $ad->price - 10)->type('input[name=max]', $ad->price + 10)
                ->click('#category')
                ->mouseover('#cat-' . $parent->id)
                ->waitFor('#cat-' . $ad->category_id)
                ->click('#cat-' . $ad->category_id)
                ->waitFor('#brand_id')
                ->value('input[name=brand_id]', $ad->brand_id)
                ->value('input[name=color_id]', $ad->color_id)
                ->value('input[name=size_id]', $ad->size_id)
                ->press('Search')
                ->waitForText($ad->title)
                ->assertRouteIs('search')
                ->assertSee($ad->title);
        });
    }

}
