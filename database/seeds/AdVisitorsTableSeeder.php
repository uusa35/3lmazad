<?php

use App\Models\Visitor;
use Illuminate\Database\Seeder;

class AdVisitorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Visitor::class, 50)->create();
    }
}
