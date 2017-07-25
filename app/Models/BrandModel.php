<?php

namespace App\Models;


use App\Services\Traits\LocaleTrait;

class BrandModel extends BaseModel
{
    use LocaleTrait;
    public $localeStrings = ['name'];
    protected $table = 'models';

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function ads() {
        return $this->hasMany(Ad::class);
    }
}
