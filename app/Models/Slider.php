<?php

namespace App\Models;

use App\Scopes\ScopeActive;

/**
 * App\Models\Slider
 *
 * @mixin \Eloquent
 */
class Slider extends BaseModel
{
    protected $guarded = [''];
    protected $localeStrings = ['title'];
    protected $casts = [
        'active' => 'boolean'
    ];

    /**
     * The "booting" method of the model.
     * applying the scope only in the backend routes.
     *
     * @return void
     */
    protected static function boot()
    {
        parent::boot();

        if (!in_array('backend', request()->segments(), true)) {
            static::addGlobalScope(new ScopeActive());
        }

    }

}
