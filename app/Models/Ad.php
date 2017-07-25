<?php

namespace App\Models;

use App\Models\Helpers\AdHelpers;
use App\Models\Traits\AdTrait;
use App\Scopes\ScopeActive;
use App\Scopes\ScopeExpired;
use App\Scopes\ScopeIsSold;
use App\Services\Traits\LocaleTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Ad extends Model
{
    use AdTrait, AdHelpers, SoftDeletes, LocaleTrait;
    public $localeStrings = [''];
    protected $guarded = [''];
    protected $casts = [
        'active' => 'boolean',
        'featured' => 'boolean'
    ];
    protected $dates = ['start_date', 'end_date', 'created_at', 'updated_at', 'deleted_at'];
    protected $with = ['meta', 'deals'];

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
            if (!in_array('backend', request()->segments(), true)) {
                static::addGlobalScope(new ScopeActive());
                static::addGlobalScope(new ScopeExpired());
                static::addGlobalScope(new ScopeIsSold());
            }
        }
    }
}
