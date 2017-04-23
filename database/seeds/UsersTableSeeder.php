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
        factory(User::class, 15)->create();
    }
}
