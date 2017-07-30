<?php

use App\AbuseReport;
use Illuminate\Database\Seeder;

class AbuseReportsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(AbuseReport::class,50)->create();
    }
}
