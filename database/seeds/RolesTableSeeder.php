<?php

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = ['admin', 'user'];
        foreach ($roles as $k => $v) {
            factory(Role::class)->create(['name' => $v])->each(function ($role) {
                if ($role->name === 'admin') {
                    $role->users()->attach((User::whereId(1)->first()->id));
                } else {
                    $role->users()->attach(User::where('id', '!=', 1)->pluck('id'));
                }
            });
        }
    }
}
