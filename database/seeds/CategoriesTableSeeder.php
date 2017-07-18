<?php

use App\Models\AdMeta;
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
use App\Models\User;
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
        if (app()->environment('seeding')) {
            $categories = config('categories');
            foreach ($categories as $category) {
                // ASSIGN FORM FOR A PARENT CATEGORY
                $form = factory(Form::class)->create();
                //PARENT
                $parent = factory(Category::class)->create(['parent_id' => 0, 'name_ar' => $category['parent'], 'name_en' => $category['parent'], 'form_id' => $form->id]);
                // BRAND FOR EACH PARENT
                factory(Brand::class, 6)->create(['category_id' => $parent->id])->each(function ($brand) {
                    // MODEL FOR EACH BRAND
                    factory(BrandModel::class, 6)->create(['brand_id' => $brand->id]);
                });
                // TYPES FOR EACH PARENT
                factory(Type::class, 5)->create(['category_id' => $parent->id]);


                $isFilterArray = ['brand_id', 'model_id', 'condition', 'manufacturing_year', 'type',
                    'transmission', 'room_no', 'floor_no', 'mileage',
                    'bathroom_no', 'rent_type', 'building_age', 'furnished', 'space'];
                $isFilterArrayCars = ['brand_id', 'model_id', 'condition', 'manufacturing_year', 'type', 'transmission', 'mileage'];
                $isFilterArrayProperty = ['type', 'room_no', 'floor_no', 'bathroom_no', 'rent_type', 'building_age', 'furnished', 'space'];
                $isFilterArrayMobile = ['brand_id', 'model_id', 'condition', 'type',];
                $form->fields()->attach(Field::inRandomOrder()->take(4)->pluck('id'));
                $form->categories()->save($parent);
                foreach ($category['sub'] as $sub) {
                    //SUB
                    $subCat = factory(Category::class)->create(['parent_id' => $parent->id, 'name_en' => $sub, 'name_ar' => $sub]);

                    // CREATE ADS FOR EACH SUB
                    factory(Ad::class, 20)->create(['category_id' => $subCat->id])->each(function ($ad) use ($subCat) {

                        $subCat->ads()->save($ad);

                        $gallery = factory(Gallery::class)->create(['galleryable_id' => $ad->id, 'galleryable_type' => Ad::class]);

                        // create meta for each ad
                        $ad->meta()->save(factory(AdMeta::class)->create());

                        // GALLERY FOR EACH ADD
                        $ad->gallery()->save($gallery);
                        // IMAGES FOR EACH GALLERY
                        factory(Image::class, 2)->create(['gallery_id' => $gallery->id]);

                        // COMMENTS FOR EACH AD
                        $ad->comments()->saveMany(factory(Comment::class, 2)->create());

                        // Auctions FOR EACH AD
                        $ad->auctions()->saveMany(factory(Auction::class, 2)->create(['ad_id' => $ad->id]));

                        $ad->deals()->saveMany(factory(Deal::class, 1)->create());

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
