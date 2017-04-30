<?php

use App\Models\Plan;
use Illuminate\Database\Seeder;

class PlansTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $plans = collect([
            [
                'name' => 'free',
                'duration' => '1',
                'price' => 0
            ],
            [
                'name' => 'tow days',
                'duration' => '2',
                'price' => 2
            ],
            [
                'name' => 'three days',
                'duration' => '3',
                'price' => 3
            ],
            [
                'name' => 'four days',
                'duration' => '4',
                'price' => 5
            ]
        ]);
        foreach ($plans as $plan) {
            factory(Plan::class)->create(['name_en' => $plan['name'], 'price' => $plan['price'], 'duration' => $plan['duration']]);
        }
    }
}
