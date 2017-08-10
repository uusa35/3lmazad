<?php

use App\Models\Announcement;
use App\Models\Event;
use App\Models\Gallery;
use App\Models\Image;
use App\Models\News;
use App\Models\Presentation;
use App\Models\User;
use App\Models\UserAgency;
use App\Models\UserMeta;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(User::class, 30)->create()->each(function ($user) {
            $gallery = factory(Gallery::class)->create(['galleryable_id' => $user->id, 'galleryable_type' => User::class]);
            $user->gallery()->save($gallery);
            $gallery->images()->saveMany(factory(Image::class, 10)->create());
        });
    }
}
