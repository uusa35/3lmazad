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
use App\Models\Aboutus;
use App\Models\Ad;
use App\Models\Area;
use App\Models\Auction;
use App\Models\Brand;
use App\Models\BrandModel;
use App\Models\Category;
use App\Models\Color;
use App\Models\Comment;
use App\Models\Contactus;
use App\Models\Country;
use App\Models\Field;
use App\Models\Form;
use App\Models\Gallery;
use App\Models\Image;
use App\Models\Model;
use App\Models\Newsletter;
use App\Models\Role;
use App\Models\Size;
use App\Models\Slider;
use App\Models\Type;
use App\Models\User;

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(User::class, function (Faker\Generator $faker) {
    static $password;
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'active' => 1,
        'phone' => $faker->bankAccountNumber,
        'featured' => $faker->boolean(80),
        'remember_token' => str_random(10),
//        'settings' => ['certificate' => $faker->name, 'height' => $faker->numberBetween(100, 200)],
        'country_id' => Country::all()->random()->id,
    ];
});

$factory->define(Role::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
    ];
});

$factory->define(Category::class, function (Faker\Generator $faker) {
    return [
        'name_ar' => $faker->name,
        'name_en' => $faker->name,
        'parent_id' => $faker->numberBetween(0, 10),
        'featured' => 1,
        'form_id' => Form::all()->random()->id
    ];
});

$factory->define(Brand::class, function (Faker\Generator $faker) {
    return [
        'name_ar' => $faker->word,
        'name_en' => $faker->word,
        'category_id' => Category::all()->where('parent_id', false)->random()->id
    ];
});

$factory->define(Type::class, function (Faker\Generator $faker) {
    return [
        'name_ar' => $faker->word,
        'name_en' => $faker->word,
        'category_id' => Category::all()->where('parent_id', false)->random()->id
    ];
});

$factory->define(BrandModel::class, function (Faker\Generator $faker) {
    return [
        'name_ar' => $faker->word,
        'name_en' => $faker->word,
        'brand_id' => Brand::all()->random()->id
    ];
});

$factory->define(Form::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->word,
    ];
});

$factory->define(Field::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'value' => $faker->name,
    ];
});

$factory->define(Ad::class, function (Faker\Generator $faker) {
    return [
        'title' => $faker->word,
        'description' => $faker->word,
        'price' => $faker->randomDigit,
        'active' => $faker->boolean(100),
        'featured' => $faker->boolean(100),
        'phone' => $faker->bankAccountNumber,
        'condition' => $faker->randomElement(['new', 'old']),
        'manufacturing_year' => $faker->year,
        'mileage' => $faker->numberBetween(10, 99999),
        'transmission' => $faker->randomElement(['manual', 'automatic']),
        'room_no' => $faker->randomDigit,
        'floor_no' => $faker->randomDigit,
        'bathroom_no' => $faker->randomDigit,
        'rent_type' => $faker->word,
        'building_age' => $faker->year,
        'furnished' => $faker->boolean(true),
        'space' => $faker->randomDigit,
        'address' => $faker->address,
        'image' => 'sample.jpg',
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
        'color_id' => Color::all()->random()->id,
        'size_id' => Size::all()->random()->id,
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
        'code' => $faker->rgbColor,
    ];
});

$factory->define(Gallery::class, function (Faker\Generator $faker) {
    return [
        'description_ar' => $faker->paragraph(2),
        'description_en' => $faker->paragraph(2),
        'image' => 'sample.png',
        'galleryable_id' => Ad::all()->random()->id,
        'galleryable_type' => Ad::class,
    ];
});
$factory->define(Image::class, function (Faker\Generator $faker) {
    return [
        'gallery_id' => Gallery::all()->random()->id,
        'is_main' => $faker->boolean(),
        'thumb_url' => 'image.jpg',
        'medium_url' => 'image.jpg',
        'large_url' => 'image.jpg'
    ];
});

$factory->define(Contactus::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'facebook_url' => $faker->url,
        'twitter_url' => $faker->url,
        'instagram_url' => $faker->url,
        'youtube_url' => $faker->url,
        'phone' => $faker->phoneNumber,
        'mobile' => $faker->phoneNumber,
        'email' => $faker->email,
        'address' => $faker->address,
        'latitude' => $faker->latitude,
        'longitude' => $faker->longitude,
        'logo' => 'sample.png',
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
        'title' => $faker->name,
        'description' => $faker->paragraph(2),
    ];
});


$factory->define(Slider::class, function (Faker\Generator $faker) {
    return [
        'title' => $faker->name,
        'url' => $faker->url,
        'image' => 'sample.png',
        'order' => $faker->numberBetween(1, 10),
        'active' => $faker->boolean(true),
    ];
});


