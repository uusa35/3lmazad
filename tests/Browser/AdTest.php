<?php

namespace Tests\Browser;

use App\Models\Area;
use App\Models\Category;
use App\Models\Color;
use App\Models\Field;
use App\Models\Option;
use App\Models\Size;
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
                ->select('parent', $parent->id)
                ->waitForText($parent->name_en)
                ->select('category_id', $child->id)
                ->value('#input-create-is_new', Field::where('name', 'is_new')->first()->options->random()->value)
                ->waitForText('general.is_new')
                ->value('#input-create-is_automatic', Field::where('name', 'is_automatic')->first()->options->random()->value)
                ->type('#input-create-manufacturing_year', 1999)
                ->type('#input-create-mileage', rand(222, 333))
                ->select('#input-create-color_id', Color::all()->random()->id)
                ->select('#input-create-size_id', Size::all()->random()->id)
                ->select('area_id', Area::all()->random()->id)
                ->type('address', 'whatever')
                ->select('#input-create-brand_id', $parent->brands->first()->id)
                ->select('#input-create-model_id', $parent->brands->first()->models()->get()->random()->id)
                ->pause(100000000)
                ->press('general.submit')
                ->assertSee('success');
        });
    }
}
