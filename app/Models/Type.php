<?php

namespace App\Models;

use App\Services\Traits\LocaleTrait;

class Type extends BaseModel
{
    use LocaleTrait;
    public $localeStrings = ['name'];
    protected $guarded = [''];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function ads()
    {
        return $this->hasMany(Ad::class);
    }
}
