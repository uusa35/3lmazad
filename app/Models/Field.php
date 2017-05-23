<?php

namespace App\Models;


class Field extends BaseModel
{

    public function forms()
    {
        return $this->belongsToMany(Form::class);
    }

    public function scopeIsFilter($q)
    {
        return $q->where('is_filter', true);
    }

}
