<?php

use App\Models\Category;
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
            factory(Category::class, 1)->create(['parent_id' => 0, 'name' => 'product'])->each(function ($parent) {
                $parent->children()->saveMany(factory(Category::class, 2)->create(['parent_id' => $parent->id]))
                    // level 3 sub categories from the sub of the parent
                    ->each(function ($child) {
                        $child->children()->saveMany(factory(Category::class, 3)->create(['parent_id' => $child->id]));
                    });
            });
            factory(Category::class, 1)->create(['parent_id' => 0, 'name' => 'service'])->each(function ($parent) {
                $parent->children()->saveMany(factory(Category::class, 2)->create(['parent_id' => $parent->id]))
                    ->each(function ($child) {
                        $child->children()->saveMany(factory(Category::class, 3)->create(['parent_id' => $child->id]));
                    });
            });
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
