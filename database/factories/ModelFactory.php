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
use App\Models\Brand;
use App\Models\Category;
use App\Models\Color;
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

$factory->define(Model::class, function (Faker\Generator $faker) {
    return [
        'name_ar' => $faker->word,
        'name_en' => $faker->word,
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
        'price' => $faker->word,
        'active' => $faker->word,
        'featured' => $faker->word,
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
        'furnished' => $faker->boolean(),
        'space' => $faker->randomDigit,
        'address' => $faker->words(10),
        'image' => 'sample.jpg',
        'user_id' => User::all()->random()->id,
        'category_id' => Category::whereHas('children.children')->random()->id,
        'area_id' => Area::where('category_id', 118)->random()->id,
        'brand_id' => function ($array) {
            return Brand::where('category_id', $array['category_id'])->random()->id;
        },
        'model_id' => function ($array) {
            return Model::where('brand_id', $array['brand_id'])->random()->id;
        },
        'color_id' => Color::all()->random()->id,
        'size_id' => Size::all()->random()->id,
    ];
});

//$factory->define(Brand::class, function (Faker\Generator $faker) {
//    return [
//        '' => $faker->,
//        '' => $faker->,
//        '' => $faker->,
//    ];
//});
//
//$factory->define(Brand::class, function (Faker\Generator $faker) {
//    return [
//        '' => $faker->,
//        '' => $faker->,
//        '' => $faker->,
//    ];
//});

$factory->define(Gallery::class, function (Faker\Generator $faker) {
    return [
        'active' => $faker->boolean(),
        'description' => $faker->paragraph(2),
        'image' => 'sample.png',
        'galleryable_id' => $faker->randomDigit,
        'galleryable_type' => $faker->name,
    ];
});
$factory->define(Image::class, function (Faker\Generator $faker) {
    return [
        'gallery_id' => Gallery::withoutGlobalScopes()->get()->random()->id,
        'caption' => $faker->name,
        'path' => 'sample.png'
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
        'active' => $faker->boolean(),
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
        'active' => $faker->boolean(),
    ];
});


