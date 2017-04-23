<?php
namespace App\Services\Search;

use App\Models\Category;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

/**
 * Created by PhpStorm.
 * User: usamaahmed
 * Date: 2/7/17
 * Time: 8:40 AM
 */
class Filters extends QueryFilters
{
    public $roles;

    public function __construct(Request $request)
    {
        parent::__construct($request);
        $this->roles = Role::where('is_company', true)->pluck('id')->toArray();
    }

    public function search($search)
    {
        $array = array_merge($this->roles, ['news', 'presentation', 'announcement', 'user']);
//        if (!in_array(request()->type, $array)) {
//            abort(404, 'not the right key for searching');
//        }
        switch (request()->get('type')) {
            case 'news':
                return $this->searchAll($search);
            case 'announcement':
                return $this->searchAll($search);
            case 'presentation':
                return $this->searchAll($search);
            case 'user' :
                if (request()->has('main')) {
                    return $this->main($search);
                } else {
                    return $this->sub($search);
                }
            default :
                return $this->companies($search);
        }
    }

    /**
     * @param $search
     * @return mixed
     * searching inside news or presentations or announcements
     */
    public function searchAll($search)
    {
        return $this->builder->where('title', 'like', "%{$search}%")
            ->orWhere('body', 'like', "%{$search}%");
    }

    /**
     * @param $search
     * @return mixed
     * searching the user table + user_meta with roles of contracutros + distributors + manifacturers
     */
    public function companies($search)
    {
//        $role = Role::whereId(request()->type)->first()->name;
        return $this->builder->where('name', 'like', "%{$search}%")
            ->whereHas('user_meta', function ($q) use ($search) {
                $q->orWhere('description', 'like', "%{$search}%");
            })->active()->companies();
//            ->roleOf($role);
    }

    public function sub($search)
    {
        // if only search field is equal to all then it will start fetching by categories only (_category-sub-menu)
        if ($search === 'all') {
            return $this->builder->whereHas('items', function ($q) {
                $q->where('category_id', '=', request()->sub);
            })->companies();
        }
    }

    public function main($search)
    {
        // all companies (users) that have items which their category_id belongs to the parent id (request()->main)
        if ($search === 'all') {
            return $this->builder->whereHas('items', function ($q) {
                $q->whereHas('category', function ($q) {
                    $q->where('parent_id', '=', request()->main);
                });
            })->companies();
        }
    }

}