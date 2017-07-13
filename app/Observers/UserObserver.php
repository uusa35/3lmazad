<?php
namespace App\Observers;

use App\Models\Role;
use App\Models\User;

/**
 * Created by PhpStorm.
 * User: usamaahmed
 * Date: 6/28/17
 * Time: 6:40 PM
 */
class UserObserver
{
    /**
     * Listen to the User created event.
     *
     * @param  User $user
     * @return void
     */
    public function created(User $user)
    {
        if (!app()->environment('seeding')) {
            $user->roles()->save(Role::where('name', 'user')->first());
        }
    }

    /**
     * Listen to the User deleting event.
     *
     * @param  User $user
     * @return void
     */
    public function deleted(User $user)
    {
        $user->roles()->detach(Role::where('name', 'user')->first());
    }
}