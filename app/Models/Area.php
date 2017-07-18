<?php

namespace App\Models;

use App\Services\Traits\LocaleTrait;

class Area extends BaseModel
{
    protected $guarded = [''];
    protected  $localStrings = ['name'];

    public function country()
    {
        return $this->belongsTo(Country::class);
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
