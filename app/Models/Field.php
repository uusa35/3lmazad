<?php

namespace App\Models;

use App\Scopes\ScopeActive;
use App\Services\Traits\LocaleTrait;
use Illuminate\Database\Eloquent\Model;

class Field extends Model
{
    use LocaleTrait, ModelHelpers;
    public $localeStrings = ['label'];
    protected $guarded = [''];
    protected $with = ['options'];

    /**
     * The "booting" method of the model.
     * applying the scope only in the backend routes.
     *
     * @return void
     */
    protected static function boot()
    {
        parent::boot();

        if (!app()->environment('seeding')) {
            if (!in_array('backend',request()->segments(), true)) {
                static::addGlobalScope(new ScopeActive());
            }
        }
    }

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
