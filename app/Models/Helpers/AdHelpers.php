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
    public function getMostVisitedAds($take = 10)
    {
        return $this->selectRaw('ads.*, count(*) as ad_count')
            ->join('favorites', 'ads.id', '=', 'favorites.ad_id')
            ->groupBy('ad_id')// responsible to get the sum of ads returned
            ->orderBy('ad_count', 'DESC')
            ->take($take)->get();

    }

    public function scopeHasValidDeal($q)
    {
        return $q->whereHas('deals', function ($q) {
            return $q;
        }, '>', 0);
    }

    public function getNotExpiredAttribute()
    {
        return ($this->endDate > date('Y-m-d')) ? true : false;
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