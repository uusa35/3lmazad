<?php

namespace Tests\Browser;

use App\Models\Area;
use App\Models\Category;
use App\Models\Color;
use App\Models\Field;
use App\Models\Option;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class AdTest extends DuskTestCase
{
    /**
     * @throws \Exception
     * @throws \Throwable
     * @group ad.create.car
     */
    public function test_post_ad_create_for_vehicles()
    {
        $path = app_path('public/storage/uploads/images/thumbnail/');
        $category = new Category();
        $parent = $category->parents()->where('name_en', 'vehicles')->first();
        $child = $category->whereId($parent->id)->first()->children()->get()->random()->first();
        $this->browse(function (Browser $browser) use ($path, $parent, $child) {
            $browser->loginAs(User::find(12))
                ->visit('ad/create')
                ->type('title', 'test title')
                ->type('description', 'test description')
//                ->attach('image', __DIR__ . $path . 'sample1.jpeg')
//                ->attach('images[]', __DIR__ . $path . 'sample2.jpeg')
                ->type('price', rand(1, 50))
                ->type('mobile', rand(1, 10))
                ->select('main_cat_id', $parent->id)
                ->waitForText($parent->name_en)
                ->select('category_id', $child->id)
                ->waitForText('general.brands')
                ->select('#brands-items-' . $parent->id, $parent->brands->first()->id)
                ->select('#models-items-' . $parent->id, $parent->brands->first()->models->random()->id)
                ->waitForText('general.condition')
                ->value('#condition-items-' . $parent->id, Field::where('name', 'condition')->first()->options->random()->id)
                ->value('#transmission-items-' . $parent->id, Field::where('name', 'transmission')->first()->options->random()->id)
                ->type('#manufacturing_year-items-' . $parent->id, 1999)
                ->type('#mileage-items-' . $parent->id, rand(222, 333))
                ->select('#colors-items-' . $parent->id, Color::all()->random()->id)
                ->select('#sizes-items-' . $parent->id, Color::all()->random()->id)
                ->select('area_id', Area::all()->random()->id)
                ->type('address', 'whatever')
                ->pause(10000000000)
                ->press('general.submit')
                ->assertSee('success');
        });
    }
}
