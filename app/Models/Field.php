<?php

namespace App\Models;


class Field extends BaseModel
{
    protected $localeStrings = ['label'];
    public function forms()
    {
        return $this->belongsToMany(Form::class);
    }

    public function scopeIsFilter($q)
    {
        return $q->where('is_filter', true);
    }

}
