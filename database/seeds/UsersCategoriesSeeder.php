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
        $parents = Category::where('parent_id', 0)->doesntHave('users')->get();
        foreach ($parents as $parent) {
            $users = User::doesntHave('category')->get()->shuffle()->take(3);
            $parent->users()->saveMany($users);
        }
    }
}