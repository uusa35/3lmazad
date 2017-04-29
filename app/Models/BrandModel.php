<?php

namespace App\Models;


class BrandModel extends BaseModel
{
    protected $table = 'models';

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function ads() {
        return $this->hasMany(Ad::class);
    }
}
