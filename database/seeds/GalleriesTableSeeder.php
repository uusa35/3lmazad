<?php

use App\Models\Gallery;
use App\Models\Image;
use Illuminate\Database\Seeder;

class GalleriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//        factory(Gallery::class, 10)->create()->each(function ($gallery) {
//            $gallery->images()->save(factory(Image::class, 10)->create());
//        });
    }
}
