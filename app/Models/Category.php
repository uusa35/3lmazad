<?php

namespace App\Models;

use App\Models\Helpers\CategoryHelpers;
use App\Models\Traits\CategoryTrait;
use App\Scopes\ScopeActive;
use App\Services\Traits\LocaleTrait;

/**
 * App\Models\Category
 *
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Category[] $children
 * @property-read \App\Models\Category $parent
 * @mixin \Eloquent
 */
class Category extends BaseModel
{
    use LocaleTrait, CategoryTrait, CategoryHelpers;
    protected $localeStrings = ['name'];
//    protected $with = ['parent','children'];

    /**
     * The "booting" method of the model.
     * applying the scope only in the backend routes.
     *
     * @return void
     */
    protected static function boot()
    {
        parent::boot();

        if (app()->environment() !== 'seeding') {
            if (in_array('api', request()->segments(), true)) {
                static::addGlobalScope(new ScopeActive());
            }

            if (!in_array('backend', request()->segments(), true)) {
                static::addGlobalScope(new ScopeActive());
            }
        }
    }

    protected $guarded = [''];

    public function parent()
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }

    public function children()
    {
        return $this->hasMany(Category::class, 'parent_id');
    }
}
