<?php

namespace App\Models;

use App\Services\Traits\LocaleTrait;
use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    use LocaleTrait;
    public  $localeStrings = ['name'];
    protected $guarded = [''];

    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function cities() {
        return $this->hasMany(City::class);
    }

    public function ads()
    {
        return $this->hasMany(Ad::class);
    }

    public function user()
    {
        return $this->hasMany(User::class);
    }
}
