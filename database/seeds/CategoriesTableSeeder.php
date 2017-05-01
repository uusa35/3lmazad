<?php

use App\Models\Auction;
use App\Models\Ad;
use App\Models\Brand;
use App\Models\BrandModel;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Deal;
use App\Models\Field;
use App\Models\Form;
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
        if (app()->environment() === 'seeding') {
            $categories = config('categories');
            foreach ($categories as $category) {
                //PARENT
                $parent = factory(Category::class)->create(['parent_id' => 0, 'name_ar' => $category['parent'], 'name_en' => $category['parent']]);
                // BRAND FOR EACH PARENT
                factory(Brand::class, 2)->create(['category_id' => $parent->id])->each(function ($brand) {
                    // MODEL FOR EACH BRAND
                    $brand->models()->saveMany(factory(BrandModel::class, 3)->create());
                });
                // TYPES FOR EACH PARENT
                $parent->types()->saveMany(factory(Type::class, 2)->create());

                $form = factory(Form::class)->create();
                $form->each(function ($form) {
                    $form->fields()->attach(Field::all()->random()->pluck('id')->shuffle()->take(5));
                });
                $form->categories()->save($parent);

                foreach ($category['sub'] as $sub) {
                    //SUB
                    $subCat = factory(Category::class)->create(['parent_id' => $parent->id, 'name_en' => $sub, 'name_ar' => $sub]);

                    // CREATE ADS FOR EACH SUB
                    factory(Ad::class,5)->create(['category_id' => $subCat->id])->each(function ($ad) use ($subCat) {

                        $subCat->ads()->save($ad);

                        $gallery = factory(Gallery::class)->create();

                        // GALLERY FOR EACH ADD
                        $ad->gallery()->save($gallery);
                        // IMAGES FOR EACH GALLERY
                        factory(Image::class, 2)->create(['gallery_id' => $gallery->id]);

                        // COMMENTS FOR EACH AD
                        $ad->comments()->saveMany(factory(Comment::class, 2)->create());

                        // Auctions FOR EACH AD
                        $ad->auctions()->saveMany(factory(Auction::class, 2)->create(['ad_id' => $ad->id]));

                        $ad->deals()->saveMany(factory(Deal::class,2)->create());

                    });

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
