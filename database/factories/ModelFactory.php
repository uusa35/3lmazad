<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/
use App\AbuseReport;
use App\Models\Aboutus;
use App\Models\Ad;
use App\Models\AdMeta;
use App\Models\Area;
use App\Models\Auction;
use App\Models\Brand;
use App\Models\BrandModel;
use App\Models\Category;
use App\Models\City;
use App\Models\Color;
use App\Models\Comment;
use App\Models\Commercial;
use App\Models\Contactus;
use App\Models\Deal;
use App\Models\Faq;
use App\Models\Favorite;
use App\Models\Field;
use App\Models\Gallery;
use App\Models\Group;
use App\Models\Image;
use App\Models\Menu;
use App\Models\Model;
use App\Models\Newsletter;
use App\Models\Option;
use App\Models\Plan;
use App\Models\Role;
use App\Models\Service;
use App\Models\Size;
use App\Models\Slider;
use App\Models\Term;
use App\Models\Type;
use App\Models\User;
use App\Models\Visitor;

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(User::class, function (Faker\Generator $faker) {
    static $password;
    return [
        'name' => $faker->name,
        'email' => 'fahadalhajrey97@hotmail.com',
        'password' => $password ?: $password = bcrypt('secret'),
        'active' => 1,
        'is_mobile_visible' => 1,
        'is_email_visible' => 1,
        'mobile' => $faker->bankAccountNumber,
        'address' => $faker->address,
        'timing' => $faker->sentence(4),
        'phone' => $faker->bankAccountNumber,
        'description' => $faker->paragraph(4),
        'featured' => $faker->boolean(80),
        'remember_token' => str_random(10),
        'avatar' => 'sample' . $faker->numberBetween(1, 10) . '.jpeg',
//        'settings' => ['certificate' => $faker->name, 'height' => $faker->numberBetween(100, 200)],
        'area_id' => Area::where('country_id', '=', 118)->pluck('id')->shuffle()->first(),
        'country_id' => 118,
        'group_id' => Group::all()->random()->id
    ];
});

$factory->define(Role::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'is_admin' => $faker->boolean(false)
    ];
});

$factory->define(Category::class, function (Faker\Generator $faker) {
    return [
        'name_ar' => $faker->name,
        'name_en' => $faker->name,
        'order' => $faker->numberBetween(1, 50),
        'icon' => $faker->randomElement(['remove', 'remove circle', 'shopping basket', 'shopping bag', 'tag', 'tags', 'mobile', 'tablet',
            'desktop', 'bus', 'car', 'ship', 'taxi', 'coffee', 'android', 'apple'
        ]),
        'parent_id' => $faker->numberBetween(0, 10),
        'featured' => $faker->boolean(true),
        'active' => $faker->boolean(true),
        'on_homepage' => function ($array) {
            if ($array['parent_id'] == 0) {
                return true;
            }
            return false;
        }
    ];
});

$factory->define(Group::class, function (Faker\Generator $faker) {
    return [
        'name_ar' => $faker->name,
        'name_en' => $faker->name,
        'icon' => $faker->randomElement(['remove', 'remove circle', 'shopping basket', 'shopping bag', 'tag', 'tags', 'mobile', 'tablet',
            'desktop', 'bus', 'car', 'ship', 'taxi', 'coffee', 'android', 'apple'
        ]),
        'active' => $faker->boolean(true),
        'order' => $faker->numberBetween(1, 100)
    ];
});

$factory->define(Brand::class, function (Faker\Generator $faker) {
    return [
        'name_ar' => $faker->word,
        'name_en' => $faker->word,
        'image' => 'sample' . $faker->numberBetween(1, 10) . '.jpeg',
        'order' => $faker->numberBetween(1, 20),
        'category_id' => Category::all()->where('parent_id', false)->random()->id
    ];
});

$factory->define(Type::class, function (Faker\Generator $faker) {
    return [
        'name_ar' => $faker->word,
        'name_en' => $faker->word,
        'icon' => $faker->randomElement(['shopping basket', 'shopping bag', 'tag', 'tags', 'mobile', 'tablet',
            'desktop', 'bus', 'car', 'ship', 'taxi', 'conffee', 'android', 'apple'
        ]),
        'category_id' => Category::all()->where('parent_id', false)->random()->id
    ];
});

$factory->define(BrandModel::class, function (Faker\Generator $faker) {
    return [
        'name_ar' => $faker->word,
        'name_en' => $faker->word,
        'image' => 'sample' . $faker->numberBetween(1, 10) . '.jpeg',
        'order' => $faker->numberBetween(1, 20),
        'brand_id' => Brand::all()->random()->id
    ];
});


$factory->define(Field::class, function (Faker\Generator $faker) {
    return [
        'is_required' => $faker->boolean(false),
        'name' => $faker->name,
        'active' => true,
        'is_model' => true,
        'searchable' => true,
        'in_form' => true,
        'label_ar' => function ($array) {
            return $array['name'];
        },
        'label_en' => function ($array) {
            return $array['name'];
        },
        'icon' => $faker->randomElement(['remove', 'remove circle', 'shopping basket', 'shopping bag', 'tag', 'tags', 'mobile', 'tablet',
            'desktop', 'bus', 'car', 'ship', 'taxi', 'conffee', 'android', 'apple'
        ]),
        'type' => $faker->randomElement(['text', 'hidden', 'multiple', 'radio']),
    ];
});

$factory->define(Option::class, function (Faker\Generator $faker) {
    return [
        'name_ar' => $faker->name,
        'name_en' => $faker->name,
        'value' => $faker->name,
        'field_id' => Field::all()->random()->id,
        'active' => true
    ];
});

$factory->define(Ad::class, function (Faker\Generator $faker) {
    return [
        'title' => $faker->sentence(6),
        'price' => $faker->randomFloat(4, 4, 1000),
        'active' => $faker->boolean(100),
        'is_sold' => $faker->boolean(false),
        'booked' => $faker->boolean(),
        'featured' => $faker->boolean(),
        'image' => 'sample' . $faker->numberBetween(1, 10) . '.jpeg',
        'user_id' => User::all()->random()->id,
        'category_id' => Category::where('parent_id', false)->pluck('id')->shuffle()->first(),
        'area_id' => Area::where('country_id', '=', 118)->pluck('id')->shuffle()->first(),
        'brand_id' => function ($array) {
            $parentCategoryId = Category::where('id', $array['category_id'])->first()->parent()->first()->id;
            return Brand::where('category_id', '=', $parentCategoryId)->pluck('id')->shuffle()->first();
        },
        'model_id' => function ($array) {
            return BrandModel::where('brand_id', '=', $array['brand_id'])->first()->id;
        },
        'type_id' => function ($array) {
            $parentCategoryId = Category::where('id', $array['category_id'])->first()->parent()->first()->id;
            return Type::where('category_id', '=', $parentCategoryId)->pluck('id')->shuffle()->first();
        },
        'color_id' => Color::all()->random()->id,
        'size_id' => Size::all()->random()->id
    ];
});

$factory->define(AdMeta::class, function (Faker\Generator $faker) {
    return [
        'description' => $faker->paragraph(3),
        'mobile' => $faker->bankAccountNumber,
        'manufacturing_year' => $faker->year,
        'mileage' => $faker->numberBetween(10, 99999),
        'rent_type' => $faker->randomElement(['daily', 'monthly', 'weekly', 'yearly']),
        'room_no' => $faker->randomDigit,
        'floor_no' => $faker->randomDigit,
        'bathroom_no' => $faker->randomDigit,
        'building_age' => $faker->year,
        'space' => $faker->randomDigit,
        'address' => $faker->address,
        'is_new' => $faker->boolean(),
        'is_furnished' => $faker->boolean(true),
        'is_automatic' => $faker->boolean(),
        'ad_id' => $faker->numberBetween(1, 100)
    ];
});

$factory->define(Size::class, function (Faker\Generator $faker) {
    return [
        'name_ar' => $faker->name,
        'name_en' => $faker->name,
    ];
});

$factory->define(Comment::class, function (Faker\Generator $faker) {
    return [
        'body' => $faker->sentence(10),
        'user_id' => User::all()->random()->id,
        'commentable_id' => Ad::all()->random()->id,
        'commentable_type' => Ad::class,
    ];
});

$factory->define(Auction::class, function (Faker\Generator $faker) {
    return [
        'amount' => $faker->randomDigit,
        'user_id' => User::all()->random()->id,
        'ad_id' => Ad::all()->random()->id,
    ];
});

$factory->define(Color::class, function (Faker\Generator $faker) {
    return [
        'name_ar' => $faker->name,
        'name_en' => $faker->name,
        'code' => $faker->hexColor,
        'order' => $faker->numberBetween(1, 20),
    ];
});

$factory->define(Plan::class, function (Faker\Generator $faker) {
    return [
        'name_ar' => $faker->name,
        'name_en' => $faker->name,
        'description_en' => $faker->sentence(6),
        'description_ar' => $faker->sentence(3),
        'duration' => $faker->randomDigit,
        'price' => $faker->randomFloat(4, 4, 10),
        'sale_price' => $faker->randomFloat(4, 2, 3),
        'active' => $faker->boolean(true),
        'is_paid' => $faker->boolean(),
    ];
});

$factory->define(Deal::class, function (Faker\Generator $faker) {
    return [
        'plan_id' => Plan::all()->random()->id,
        'price' => function ($array) {
            return Plan::whereId($array['plan_id'])->first()->price;
        },
        'duration' => function ($array) {
            return Plan::whereId($array['plan_id'])->first()->duration;
        },
        'total' => function ($array) {
            return $array['price'] * $array['duration'];
        },
        'valid' => $faker->boolean(true),
        'ad_id' => Ad::all()->random()->id,
        'start_date' => $faker->dateTimeBetween($faker->randomElement(['-1 days', 'today', '-1 days']), '1 week'),
        'end_date' => $faker->dateTimeBetween('today', '1 week'),
    ];
});


$factory->define(Gallery::class, function (Faker\Generator $faker) {
    return [
        'active' => true,
//        'galleryable_id' => Ad::all()->random()->id,
//        'galleryable_type' => Ad::class,
    ];
});

$factory->define(Image::class, function (Faker\Generator $faker) {
    return [
        'gallery_id' => Gallery::all()->random()->id,
        'is_main' => $faker->boolean(),
        'image' => 'sample' . $faker->numberBetween(1, 10) . '.jpeg',
        'description_ar' => $faker->paragraph(1),
        'description_en' => $faker->paragraph(1),
    ];
});

$factory->define(Contactus::class, function (Faker\Generator $faker) {
    return [
        'name_en' => $faker->name,
        'name_ar' => $faker->name,
        'facebook_url' => $faker->url,
        'twitter_url' => $faker->url,
        'instagram_url' => $faker->url,
        'google_url' => $faker->url,
        'youtube_url' => $faker->url,
        'phone' => $faker->phoneNumber,
        'mobile' => $faker->phoneNumber,
        'email' => $faker->email,
        'address' => $faker->address,
        'latitude' => $faker->latitude,
        'longitude' => $faker->longitude,
        'logo' => 'sample' . $faker->numberBetween(1, 10) . '.jpeg',
    ];
});

$factory->define(Newsletter::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->email,
        'active' => $faker->boolean(true),
    ];
});

$factory->define(Aboutus::class, function (Faker\Generator $faker) {
    return [
        'title_ar' => $faker->name,
        'title_en' => $faker->name,
        'body_en' => $faker->paragraph(2),
        'body_ar' => $faker->paragraph(2),
    ];
});


$factory->define(Faq::class, function (Faker\Generator $faker) {
    return [
        'title_ar' => $faker->name,
        'title_en' => $faker->name,
        'body_en' => $faker->paragraph(2),
        'body_ar' => $faker->paragraph(2),
    ];
});

$factory->define(Term::class, function (Faker\Generator $faker) {
    return [
        'title_ar' => $faker->name,
        'title_en' => $faker->name,
        'body_en' => $faker->paragraph(2),
        'body_ar' => $faker->paragraph(2),
    ];
});

$factory->define(Favorite::class, function (Faker\Generator $faker) {
    return [
        'ad_id' => Ad::all()->random()->id,
        'user_id' => User::all()->random()->id,
    ];
});


$factory->define(Slider::class, function (Faker\Generator $faker) {
    return [
        'title_ar' => $faker->name,
        'title_en' => $faker->name,
        'url' => $faker->url,
        'image' => 'sample' . $faker->numberBetween(1, 10) . '.jpeg',
        'order' => $faker->numberBetween(1, 10),
        'active' => $faker->boolean(true),
    ];
});

$factory->define(Commercial::class, function (Faker\Generator $faker) {
    return [
        'title_ar' => $faker->name,
        'title_en' => $faker->name,
        'description_ar' => $faker->sentence(),
        'description_en' => $faker->sentence(),
        'url' => $faker->url,
        'image' => 'sample' . $faker->numberBetween(1, 10) . '.jpeg',
        'duration' => $faker->randomDigit,
        'start_date' => $faker->dateTimeBetween($faker->randomElement(['now', 'yesterday']), '1 week'),
        'end_date' => $faker->dateTimeBetween('now', '1 week'),
        'active' => $faker->boolean(true),
        'is_fixed' => $faker->boolean(),
    ];
});


$factory->define(Visitor::class, function (Faker\Generator $faker) {
    return [
        'ad_id' => Ad::all()->random()->id,
        'session_id' => $faker->numberBetween(9999, 99999999),
    ];
});

$factory->define(AbuseReport::class, function (Faker\Generator $faker) {
    return [
        'ad_id' => Ad::all()->random()->id,
        'abuser_id' => User::all()->random()->id,
        'reporter_id' => User::all()->random()->id,
    ];
});

$factory->define(Menu::class, function (Faker\Generator $faker) {
    return [
        'name_ar' => $faker->name,
        'name_en' => $faker->name,
        'active' => $faker->boolean(true),
        'user_id' => User::where('active',true)->get()->random()->id
    ];
});

$factory->define(Service::class, function (Faker\Generator $faker) {
    return [
        'name_ar' => $faker->name,
        'name_en' => $faker->name,
        'image' => 'sample' . $faker->numberBetween(1, 10) . '.jpeg',
        'price' => $faker->numberBetween(1, 100),
        'timing' => $faker->sentence(4),
        'menu_id' => Menu::all()->random()->id
    ];
});

$factory->define(City::class, function (Faker\Generator $faker) {
    return [
        'name_ar' => $faker->name,
        'name_en' => $faker->name,
        'area_id' => Area::all()->random()->id
    ];
});


