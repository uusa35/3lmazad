<?php

use App\Auction;
use App\Models\Ad;
use App\Models\Brand;
use App\Models\BrandModel;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Gallery;
use App\Models\Image;
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
            $categories = config('categories');
            foreach ($categories as $category) {
                //PARENT
                $parent = factory(Category::class)->create(['parent_id' => 0, 'name_ar' => $category['parent'], 'name_en' => $category['parent']]);
                foreach ($category['sub'] as $sub) {
                    //SUB
                    $subCat = factory(Category::class)->create(['parent_id' => $parent->id, 'name_en' => $sub, 'name_ar' => $sub]);
                    // BRAND FOR EACH SUB
                    $subCat->brands()->saveMany(factory(Brand::class, 3)->create(['category_id' => $subCat->id])->each(function ($brand) {
                        // MODEL FOR EACH BRAND
                        $brand->models()->saveMany(factory(BrandModel::class, 3)->create(['brand_id' => $brand->id]));
                    }));
                    // TYPES FOR EACH SUB
                    $subCat->types()->saveMany(factory(Type::class,2)->create(['category_id' => $subCat->id]));
                    // AD FOR EACH SUB
                    $subCat->ads()->saveMany(factory(Ad::class, 3)->create(['category_id' => $subCat->id])->each(function ($ad) {
                        // GALLERY FOR EACH ADD
                        $ad->gallery()->save(factory(Gallery::class)->create()->each(function ($gallery) {
                            $gallery->images()->saveMany(factory(Image::class)->create());
                        }));
                        // IMAGES FOR EACH GALLERY
                        // COMMENTS FOR EACH AD
                        $ad->comments()->saveMany(factory(Comment::class,3)->create());
                        $ad->comments()->saveMany(factory(Auction::class,3)->create());
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
