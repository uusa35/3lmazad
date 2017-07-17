<?php

use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Seeder;

class UsersCategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = User::doesntHave('category')->get()->shuffle()->take(3)->pluck('id');
        $parent = Category::where('parent_id',0)->first()->uesrs()->attach($users);
    }
}
