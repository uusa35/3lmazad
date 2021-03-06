<?php

namespace App\Models;

use App\Models\Helpers\AdHelpers;
use App\Models\Traits\AdTrait;
use App\Scopes\ScopeActive;
use App\Scopes\ScopeAdHasMeta;
use App\Scopes\ScopeAdHasValidDeal;
use App\Scopes\ScopeIsSold;
use App\Scopes\ScopeValid;
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
    protected $with = ['deals.plan', 'user'];

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
                static::addGlobalScope(new ScopeIsSold());
                static::addGlobalScope(new ScopeAdHasMeta());
                static::addGlobalScope(new ScopeAdHasValidDeal());
            }
        }
        static::deleting(function ($ad) { // before delete() method call this
            $ad->deals()->delete();
            $ad->comments()->delete();
            $ad->auctions()->delete();
            $ad->visitors()->delete();
            $ad->favorites()->delete();
            $ad->meta()->delete();
            $ad->gallery()->first()->images()->delete();
            $ad->gallery()->delete();
        });
    }

}
