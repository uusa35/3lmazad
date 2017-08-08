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
        $roles = ['admin', 'user', 'merchant'];
        foreach ($roles as $k => $v) {
            factory(Role::class)->create(['name' => $v, 'is_admin' => $v === 'admin' ? true : false])->each(function ($role) {
                var_dump($role->id);
                if ($role->id == 1) {
                    $role->users()->save(User::whereId(1)->first());
                } else {
                    $role->users()->attach(User::where('id', '!=', 1)->whereDoesntHave('roles', function ($q) {
                        return $q;
                    })->take(4)->pluck('id')->toArray());
                }
            });
        }
    }
}
