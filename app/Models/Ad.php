<?php

namespace App\Models;

use App\Models\Helpers\AdHelpers;
use App\Models\Traits\AdTrait;
use App\Scopes\ScopeActive;
use App\Scopes\ScopeAdHasValidDeal;
use App\Scopes\ScopeIsSold;
use App\Scopes\ScopeItemMustHaveUserWithRole;
use App\Services\Traits\LocaleTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Ad extends Model
{
    use AdTrait, AdHelpers, SoftDeletes, LocaleTrait, ModelHelpers;
    public $localeStrings = [''];
    protected $guarded = [''];
    protected $casts = [
        'active' => 'boolean',
        'featured' => 'boolean'
    ];
    protected $with = ['meta', 'deals', 'user', 'gallery', 'brand'];

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
                // reference to Deal Model. it shall fetch only valid deals only (which are not expired)
                static::addGlobalScope(new ScopeAdHasValidDeal());
                static::addGlobalScope(new ScopeIsSold());
                static::addGlobalScope(new ScopeItemMustHaveUserWithRole());
            }
        }
    }
}
