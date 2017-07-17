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
        factory(Deal::class)->create()->each(function ($deal) {
            $deal->ads()->attach(Ad::whereDoesntHave('deals', function ($q) {
                return $q;
            })->get()->random()->id);
        });
    }
}
