<?php

namespace App\Models;


class Field extends BaseModel
{
    protected $localeStrings = ['label'];
    protected $guarded = [''];
    protected $with = ['options'];

    public function forms()
    {
        return $this->belongsToMany(Form::class);
    }

    public function options() {
        return $this->hasMany(Option::class);
    }

    public function scopeIsRequired($q)
    {
        return $q->where('is_required', true);
    }

    public function getIsMultipleAttribute()
    {
        return ($this->type === 'multiple') ? true : false;
    }

}
