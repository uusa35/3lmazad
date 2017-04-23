<?php

use App\Models\Newsletter;
use Illuminate\Database\Seeder;

class NewsletterTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Newsletter::class, 3)->create();
    }
}
