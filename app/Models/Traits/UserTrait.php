<?php
namespace App\Models\Traits;

use App\Models\Ad;
use App\Models\Country;
use App\Models\Deal;

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

    public function deals()
    {
        return $this->hasMany(Deal::class);
    }
}