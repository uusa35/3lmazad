<?php

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

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
        if(Schema::hasTable('users') && DB::table('users')->count() > 0) {
            foreach ($roles as $k => $v) {
                factory(Role::class)->create(['name' => $v, 'is_admin' => $v === 'admin' ? true : false])->each(function ($role) {
                    if ($role->id == 1) {
                        $role->users()->save(User::withoutGlobalScopes()->whereId(1)->first());
                    } else {
                        $role->users()->attach(User::withoutGlobalScopes()->where('id', '!=', 1)->whereDoesntHave('roles', function ($q) {
                            return $q;
                        })->take(4)->pluck('id')->toArray());
                    }
                });
            }
        } else {
            dd('stop here');
        }
    }
}
