<?php

namespace App\Models;


class Model extends BaseModel
{
    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function ads() {
        return $this->hasMany(Ad::class);
    }
}
