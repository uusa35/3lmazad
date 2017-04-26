<?php

namespace App\Models;


class Color extends BaseModel
{
    protected $localeStrings = ['name'];


    public function ads() {
        return $this->hasMany(Ad::class);
    }
    /**
     * @param $query
     * @return mixed
     */
    public function scopeColorsList($query)
    {
        return $query->pluck('name')->unique();
    }

}
