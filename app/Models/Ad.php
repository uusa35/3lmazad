<?php

namespace App\Models;

use App\Models\Helpers\AdHelpers;
use App\Models\Traits\AdTrait;
use App\Scopes\ScopeActive;
use App\Scopes\ScopeExpired;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class Ad extends BaseModel
{
    use AdTrait, AdHelpers, SoftDeletes;
    protected $guarded = [''];
    protected $casts = [
        'active' => 'boolean',
        'featured' => 'boolean'
    ];
    protected $with = ['meta'];

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
                static::addGlobalScope(new ScopeIsSold());
            }
        }
    }

    public function getMostVisitedAds($take = 10)
    {
        return $this->selectRaw('ads.*, count(*) as ad_count')
            ->join('favorites', 'ads.id', '=', 'favorites.ad_id')
            ->groupBy('ad_id')// responsible to get the sum of ads returned
            ->orderBy('ad_count', 'DESC')
            ->take($take)->get();

    }
}
