<?php

use App\Models\AdMeta;
use Illuminate\Database\Seeder;

class AdMetasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(AdMeta::class)->create();
    }
}
