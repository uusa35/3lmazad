<?php
namespace App\Models;


/**
 * App\Models\Country
 *
 * @mixin \Eloquent
 */
class Country extends BaseModel
{
    protected $localeStrings = ['name'];
    protected $guarded = [''];

    public function user()
    {
        return $this->hasMany(User::class);
    }

    public function ads()
    {
        return $this->hasManyThrough(Ad::class, User::class);
    }

    public function areas()
    {
        return $this->hasMany(Area::class);
    }

}

?>