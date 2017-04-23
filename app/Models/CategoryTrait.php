<?php
namespace App\Models;
/**
 * Created by PhpStorm.
 * User: usamaahmed
 * Date: 1/30/17
 * Time: 4:07 PM
 */
trait CategoryTrait
{

    public function scopeParents($q)
    {
        return $q->where('parent_id', 0);
    }

    public function scopeSubCategories($q)
    {
        return $q->where('parent_id', '!=', 0);
    }

    public function scopeProductSubCategories($q)
    {
        return $q->parents()->where('name', 'product')->first()->children();
    }

    public function scopeServiceSubCategories($q)
    {
        return $q->parents()->where('name', 'service')->first()->children();
    }

    public function getParentFeaturedProductCategories()
    {
        return $this->parents()->where('name', 'product')->with('children.children')->featured()->first();
    }

    public function getParentFeaturedServiceCategories()
    {
        return $this->parents()->where('name', 'service')->with('children.children')->featured()->first();
    }

    public function scopeFeatured($q)
    {
        return $q->where('featured', true);
    }

}