<?php
/**
 * Created by PhpStorm.
 * User: usamaahmed
 * Date: 2/7/17
 * Time: 8:42 AM
 */
namespace App\Services\Search;


use App\Http\Requests\Frontend\HomePageSearch;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

abstract class QueryFilters
{
    protected $request;
    protected $builder;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function filters()
    {
        $removeNull = array_filter($this->request->all(), function ($value) {
            if (!is_null($value)) {
                return $value;
            }
        });
        return $removeNull;
    }

    public function apply(Builder $builder)
    {
        $this->builder = $builder;
        if (is_null($this->filters())) {
            abort(505, 'filters are null ..');
        }

        foreach ($this->filters() as $key => $value) {
            call_user_func_array([$this, $key], array_filter([$value]));
        }

        return $this->builder;
    }

}