<?php

namespace App\Models;

class Type extends BaseModel
{
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
