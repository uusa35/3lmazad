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
        var_dump('from search');
        return $this->builder->where(function ($q) use ($search) {
            $q->whereHas('meta', function ($q) use ($search) {
                return $q->where('description', 'like', "%{$search}%");
            })->orWhere('title', 'like', "%{$search}%");
        });
    }

    public function main()
    {
        var_dump('from main');
        $subs = $this->category->whereId(request()->main)->first()->children()->pluck('id')->toArray();
        return $this->sub($subs);
    }

    public function sub($subs = null)
    {
        if (request()->has('main')) {
            var_dump('main case from sub');
            return $this->builder->whereIn('category_id', $subs);
        } else {
            var_dump('one sub case');
            return $this->builder->where('category_id', request()->sub);
        }
    }

    public function brand_id()
    {
        var_dump('brand');
        return $this->builder->where('brand_id', request()->brand);
    }

    public function model_id()
    {
        var_dump('model');
        return $this->builder->where('model_id', request()->model);
    }

    public function type()
    {
        var_dump('type');
        return $this->builder->where('type_id', request()->type);
    }

    public function condition()
    {
        var_dump('condition');
        return $this->builder->where(function ($q) {
            return $q->whereHas('meta', function ($q) {
                return $q->where('condition', request()->condition);
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
        var_dump('area');
        return $this->builder->where('area_id', request()->area);
    }

    public function have_images()
    {
        var_dump('have images');
        return $this->builder->where('image', '!=', null);
    }

    public function only_premium()
    {
        var_dump('only premium');
        return $this->builder->where('only_premium', request()->only_premium);
    }

}