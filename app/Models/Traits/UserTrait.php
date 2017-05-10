<?php
namespace App\Models\Traits;

use App\Models\Ad;
use App\Models\Comment;
use App\Models\Country;
use App\Models\Deal;
use App\Models\Role;

/**
 * Created by PhpStorm.
 * User: usamaahmed
 * Date: 4/25/17
 * Time: 7:13 PM
 */
trait UserTrait
{
    public function ads()
    {
        return $this->hasMany(Ad::class);
    }

    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class, 'user_role');
    }

    public function favorites()
    {
        return $this->belongsToMany(Ad::class, 'favorites');
    }
}