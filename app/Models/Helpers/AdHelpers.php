<?php
namespace App\Models\Helpers;

use App\Services\Search\QueryFilters;
use Carbon\Carbon;

/**
 * Created by PhpStorm.
 * User: usamaahmed
 * Date: 4/25/17
 * Time: 7:37 PM
 */
trait AdHelpers
{
    /**
     * @param int $take
     * @return mixed
     * $this is the class
     */
    public function getMostVisitedAds($take = 10)
    {
        return $this->selectRaw('ads.*, count(*) as ad_count')
            ->join('favorites', 'ads.id', '=', 'favorites.ad_id')
            ->groupBy('ad_id')// responsible to get the sum of ads returned
            ->orderBy('ad_count', 'DESC')
            ->take($take)->get();

    }

    /**
     * @param $q
     * @return mixed
     * scope ads that have active and valid free deals only
     */
    public function scopeHasFreePlans($q)
    {
        return $q->where(function ($q) {
            return $q->whereHas('deals.plan', function ($q) {
                return $q->where('is_paid', false);
            });
        });
    }


    /**
     * @param $q
     * @return mixed
     * scope ads that have active and free deals only
     */
    public function scopeHasPaidPlans($q)
    {
        return $q->where(function ($q) {
            return $q->whereHas('deals.plan', function ($q) {
                return $q->where('is_paid', true);
            });
        });
    }

    public function getWillExpireAtAttribute()
    {
        return $this->deals->first()->end_date;
    }

    public function getHasValidDealAttribute()
    {
        return $this->deals->count() > 0 ? true : false;
    }

    public function getCategoryNameAttribute()
    {
        return $this->category->name;
    }

    public function getBrandNameAttribute()
    {
        return $this->brand->name;
    }

    public function getIsOwnerAttribute()
    {
        return auth()->check() && auth()->user()->id === $this->user_id ? true : false;
    }

    /**
     * @param $q
     * @param QueryFilters $filters
     * @return \Illuminate\Database\Eloquent\Builder
     * QueryFilters used within the search
     */
    public function scopeFilters($q, QueryFilters $filters)
    {
        return $filters->apply($q);
    }

}