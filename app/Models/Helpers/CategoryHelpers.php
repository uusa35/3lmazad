<?php
namespace App\Models\Helpers;

use App\Services\Search\QueryFilters;

/**
 * Created by PhpStorm.
 * User: usamaahmed
 * Date: 5/11/17
 * Time: 6:21 PM
 */
trait CategoryHelpers
{
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


    public function scopeParents($q)
    {
        return $q->where('parent_id', 0);
    }

    public function scopeSubCategories($q)
    {
        return $q->where('parent_id', '!=', 0);
    }

    public function scopeFeatured($q)
    {
        return $q->where('featured', true);
    }

    public function getIsParentAttribute()
    {
        return $this->parent_id === 0 ? true : false;
    }

    public function getIsSubAttribute()
    {
        // sub has One parent and many children
        return ($this->parent()->count() == 1 && $this->children()->count() >= 1) ? true : false;
    }

    public function getIsChildAttribute()
    {
        // has one parent and no children
        return $this->children()->count() == 0 ? true : false;
    }
}