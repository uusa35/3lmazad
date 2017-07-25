<?php

namespace App\Models;

use App\Scopes\ScopeActive;
use App\Services\Traits\LocaleTrait;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Slider
 *
 * @mixin \Eloquent
 */
class Slider extends Model
{
    use LocaleTrait;
    public $localeStrings = ['title'];
    protected $guarded = [''];
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
