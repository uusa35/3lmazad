<?php
namespace App\Models\Traits;

use App\AbuseReport;
use App\Models\Ad;
use App\Models\Area;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Country;
use App\Models\Deal;
use App\Models\Gallery;
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

    public function area()
    {
        return $this->belongsTo(Area::class);
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

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function gallery()
    {
        return $this->morphMany(Gallery::class, 'galleryable');
    }

    public function abuser()
    {
        return $this->hasMany(AbuseReport::class);
    }

    public function reporter()
    {
        return $this->hasMany(AbuseReport::class);
    }
}