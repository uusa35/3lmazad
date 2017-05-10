<?php

namespace App\Models;

use App\Models\Helpers\AdHelpers;
use App\Models\Traits\AdTrait;
use App\Scopes\ScopeActive;
use App\Scopes\ScopeExpired;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Ad extends BaseModel
{
    use AdTrait, AdHelpers, SoftDeletes;
    protected $guarded = [''];
    protected $casts = [
        'active' => 'boolean',
        'featured' => 'boolean'
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

        if (app()->environment() !== 'seeding') {
            if (in_array('api', request()->segments(), true)) {
                static::addGlobalScope(new ScopeActive());
            }

            if (!in_array('backend', request()->segments(), true)) {
                static::addGlobalScope(new ScopeActive());
                static::addGlobalScope(new ScopeExpired());
            }
        }
    }

}
