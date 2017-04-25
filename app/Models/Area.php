<?php

namespace App\Models;

use App\Services\Traits\LocaleTrait;

class Area extends BaseModel
{
    use LocaleTrait;
    protected $table = 'areas';
    protected $guarded = [''];
    protected $localStrings = ['name'];

    public function country() {
        return $this->belongsTo(Country::class);
    }

    public function ads() {
        return $this->hasMany(Ad::class);
    }
}
