<?php

use App\Models\Menu;
use App\Models\Service;
use Illuminate\Database\Seeder;

class MenusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Menu::class, 30)->create()->each(function ($c) {
            $c->services()->saveMany(factory(Service::class,3)->create());
        });
    }
}
