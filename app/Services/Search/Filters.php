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
    }

    public function search($search)
    {
        if ($this->request->type) {
            return $this->users($search);
        } elseif ($this->request->element) {
            return $this->searchAll($search);
        }
        else {
            $this->users($search);
        }

    }

    /**
     * @param $search
     * @return mixed
     * searching inside news or presentations or announcements
     */
    public function searchAll($search)
    {
        $test = $this->builder->where('title', 'like', "%{$search}%")
            ->orWhere('body', 'like', "%{$search}%");
    }

    /**
     * @param $search
     * @return mixed
     * searching the user table + user_meta with roles of contracutros + distributors + manifacturers
     */
    public function users($search)
    {
        if ($this->request->type === '2') {
            /*
             * always start with the bigger results then  where the bigger one then orWhere the rest
             * it means that u start with the bigger results
             * then filter with where or orWhere (or where will be applied no matter the result of the previous where)
             * */
            return $this->builder->whereHas('user_meta', function ($q) use ($search) {
                $q->where('description', 'like', "%{$search}%")->orWhere('designation', 'like', "%{$search}%");
            })->orWhere('name', 'like', "%{$search}%")->roleOf('user');

        } else {
            return $this->builder->whereHas('user_meta', function ($q) use ($search) {
                $q->where('description', 'like', "%{$search}%");
            })->orWhere('name', 'like', "%{$search}%")->companies();
        }
    }

    public function type()
    {
        return $this->builder->whereHas('roles', function ($q) {
            $q->where('role_id', request()->type);
        });
    }

    public function country()
    {
        return $this->builder->orWhere('country_id', '=', request()->country);
    }

    public function element()
    {
        return $this->builder;
    }

    public function sub($search)
    {
        // if only search field is equal to all then it will start fetching by categories only (_category-sub-menu)
        return $this->builder->whereHas('items', function ($q) {
            $q->where('category_id', '=', request()->sub);
        })->companies();
    }

    public function main($search)
    {
        // all companies (users) that have items which their category_id belongs to the parent id (request()->main)
        if ($search === 'all') {
            return $this->builder->whereHas('items', function ($q) {
                $q->whereHas('category', function ($q) {
                    $q->orWhere('parent_id', '=', request()->main);
                });
            });
        }
    }


}