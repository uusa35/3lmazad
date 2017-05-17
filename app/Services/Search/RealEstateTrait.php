<?php
namespace App\Services\Search;
/**
 * Created by PhpStorm.
 * User: usamaahmed
 * Date: 5/11/17
 * Time: 6:17 PM
 */
trait RealEstateTrait
{
    public function room_no()
    {
        var_dump('room no');
        return $this->builder->where(function ($q) {
            return $q->whereHas('meta', function ($q) {
                return $q->where('room_no', '>=', request()->room_no);
            });
        });

    }

    public function floor_no()
    {
        var_dump('floor_no');
        return $this->builder->where(function ($q) {
            return $q->whereHas('meta', function ($q) {
                return $q->where('floor_no', '<=', request()->floor_no);
            });
        });
    }

    public function bathroom_no()
    {
        var_dump('bathroom no');
        return $this->builder->where(function ($q) {
            return $q->whereHas('meta', function ($q) {
                return $q->where('bathroom_no', '>=', request()->bathroom_no);
            });
        });
    }

    public function rent_type()
    {
        var_dump('rent type');
        return $this->builder->where(function ($q) {
            return $q->whereHas('meta', function ($q) {
                return $q->where('rent_type', request()->rent_type);
            });
        });
    }

    public function building_age()
    {
        var_dump('building age');
        return $this->builder->where(function ($q) {
            return $q->whereHas('meta', function ($q) {
                return $q->where('building_age', '<=', request()->building_age);
            });
        });
    }

    public function furnished()
    {
        var_dump('furnished');
        return $this->builder->where(function ($q) {
            return $q->whereHas('meta', function ($q) {
                // 1 is true
                // false is false
                return $q->where('furnished',request()->furnished);
            });
        });
    }

    public function min_space()
    {
        var_dump('min space');
        return $this->builder->where(function ($q) {
            return $q->whereHas('meta', function ($q) {
                return $q->where('min_space', '>=', request()->min_space);
            });
        });
    }

    public function max_space()
    {
        var_dump('max_space');
        return $this->builder->where(function ($q) {
            return $q->whereHas('meta', function ($q) {
                return $q->where('max_space', '<=', request()->max_space);
            });
        });
    }

}