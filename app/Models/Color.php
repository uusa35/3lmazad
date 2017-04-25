<?php

namespace App\Models;

use App\Core\PrimaryModel;
use App\Models\Ad;
use Illuminate\Database\Eloquent\Model;

class Color extends PrimaryModel
{
    protected $localeStrings = ['name'];


    public function ad() {
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
