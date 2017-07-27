<?php

use App\Models\Ad;
use App\Models\Deal;
use Illuminate\Database\Seeder;

class DealsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Deal::class)->create();
    }
}
