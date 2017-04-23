<?php
namespace App\Models;


/**
 * App\Models\Country
 *
 * @mixin \Eloquent
 */
class Country extends BaseModel
{
    public function user()
    {
        return $this->hasMany(User::class);
    }

    public function qualifications()
    {
        return $this->hasMany(ItemQualification::class);
    }
}

?>