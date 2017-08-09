<?php
namespace App\Services\Search;

use App\Models\Category;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

/**
 * Created by PhpStorm.
 * User: usamaahmed
 * Date: 2/7/17
 * Time: 8:40 AM
 */
class Filters extends QueryFilters
{
    public $roles;
    public $category;
    use RealEstateTrait;

    public function __construct(Request $request, Category $category)
    {
        parent::__construct($request);
        $this->category = $category;
    }

    public function search($search)
    {
        return $this->builder->where(function ($q) use ($search) {
            $q->whereHas('meta', function ($q) use ($search) {
                return $q->where('description', 'like', "%{$search}%");
            })->orWhere('title', 'like', "%{$search}%");
        });
    }

    public function parent()
    {
        $subs = $this->category->whereId(request()->parent)->first()->children()->pluck('id')->toArray();
        return $this->sub($subs);
    }

    public function sub($subs = null)
    {
        if (request()->has('parent')) {
            return $this->builder->whereIn('category_id', $subs);
        } else {
            return $this->builder->where('category_id', request()->sub);
        }
    }

    public function brand_id()
    {
        return $this->builder->where('brand_id', request()->brand_id);
    }

    public function color_id()
    {
        return $this->builder->where('color_id', request()->color_id);
    }

    public function size_id()
    {
        return $this->builder->where('size_id', request()->size_id);
    }

    public function model_id()
    {
        return $this->builder->where('model_id', request()->model);
    }

    public function type()
    {
        return $this->builder->where('type_id', request()->type);
    }

    public function is_new()
    {
        return $this->builder->where(function ($q) {
            return $q->whereHas('meta', function ($q) {
                return $q->where('is_new', request()->is_new);
            });
        });
    }

    public function mileage()
    {
        return $this->builder->where(function ($q) {
            return $q->whereHas('meta', function ($q) {
                return $q->where('mileage', '<=', request()->mileage);
            });
        });
    }

    public function min($ads)
    {
        return $this->builder->where('price', '>=', request()->min);
    }

    public function max()
    {
        return $this->builder->where('price', '<=', request()->max);
    }

    public function area_id()
    {
        return $this->builder->where('area_id', request()->area);
    }

    public function rent_type()
    {
        return $this->builder->where(function ($q) {
            return $q->whereHas('meta', function ($q) {
                return $q->where('rent_type', request()->rent_type);
            });
        });
    }

    public function space()
    {
        return $this->builder->where(function ($q) {
            return $q->whereHas('meta', function ($q) {
                return $q->where('space', '>=', request()->space);
            });
        });
    }

    public function manufacturing_year()
    {
        return $this->builder->where(function ($q) {
            return $q->whereHas('meta', function ($q) {
                return $q->where('manufacturing_year', '=>', request()->manufacturing_year);
            });
        });
    }

    public function is_automatic()
    {
        return $this->builder->where(function ($q) {
            return $q->whereHas('meta', function ($q) {
                return $q->where('is_automatic', request()->is_automatic);
            });
        });
    }

    public function have_images()
    {
        return $this->builder->where('image', '!=', null);
    }

    public function only_premium()
    {
        return $this->builder->hasValidDeal();
    }

    public function page() {
        return $this->builder;
    }

}