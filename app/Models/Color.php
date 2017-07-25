<?php

namespace App\Models;


use App\Services\Traits\LocaleTrait;
use Illuminate\Database\Eloquent\Model;

class Color extends Model
{
    use LocaleTrait;
    public $localeStrings = ['name'];

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
