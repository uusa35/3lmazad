<?php

use App\Models\Contactus;
use Illuminate\Database\Seeder;

class ContactusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Contactus::class,1)->create();
    }
}
