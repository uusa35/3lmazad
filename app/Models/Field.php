<?php

namespace App\Models;

use App\Services\Traits\LocaleTrait;
use Illuminate\Database\Eloquent\Model;

class Field extends Model
{
    use LocaleTrait;
    public $localeStrings = ['label'];
    protected $guarded = [''];
    protected $with = ['options'];

    public function categories()
    {
        return $this->belongsToMany(Category::class);
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

    public function getIsTextAttribute()
    {
        return ($this->type === 'text') ? true : false;
    }

}
