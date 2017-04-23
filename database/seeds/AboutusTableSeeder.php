<?php

use App\Models\Aboutus;
use Illuminate\Database\Seeder;

class AboutusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Aboutus::class,1)->create();
    }
}
