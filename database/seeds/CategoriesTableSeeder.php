<?php

use App\Models\Ad;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Model;
use App\Models\Type;
use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // ONLY 2 LEVELS NOW OF CATEGORIES PARENT AND SUB ONLY
        if (app()->environment() === 'local') {
            foreach (config('categories') as $key => $value) {
                // PARENT
                $parent = factory(Category::class)->create(['parent_id' => 0, 'name_en' => $key]);
                // assign brands for parent category
                $parent->brands()->saveMany(factory(Brand::class, 3)->create(['category_id' => $parent->id])->each(function ($brand) {
                    // asign models for brands
//                    i stopped here !!
                    $brand->models()->saveMany(factory(Model::class, 5)->create());
                }));
                // SUB
                foreach ($value as $k => $v) {
                    $parent->children()->save(factory(Category::class)->create(['name_en' => $v])->each(function ($sub) {
                        // asign types for sub category
                        $sub->types()->saveMany(factory(Type::class, 2)->create());
                        // asign ads for sub category
                        $sub->ads()->saveMany(factory(Ad::class, 5)->create());
                    }));
                }
            }
        } elseif (app()->environment() === 'production') {
            factory(Category::class, 1)->create(['parent_id' => 0, 'name' => 'product'])->each(function ($parent) {
                $parent->children()->saveMany(factory(Category::class, 1)->create(['parent_id' => $parent->id, 'name' => 'main product cat']))
                    ->each(function ($child) {
                        $child->children()->saveMany(factory(Category::class, 1)->create(['parent_id' => $child->id, 'name' => 'sub product cat']));
                    });
            });
            factory(Category::class, 1)->create(['parent_id' => 0, 'name' => 'service'])->each(function ($parent) {
                $parent->children()->saveMany(factory(Category::class, 1)->create(['parent_id' => $parent->id, 'name' => 'main service cat']))
                    ->each(function ($child) {
                        $child->children()->saveMany(factory(Category::class, 1)->create(['parent_id' => $child->id, 'name' => 'sub service cat']));
                    });
            });
        }
    }
}
