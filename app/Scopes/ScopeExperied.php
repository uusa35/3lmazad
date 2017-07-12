<?php
/**
 * Created by PhpStorm.
 * User: usamaahmed
 * Date: 5/8/16
 * Time: 8:14 PM
 */

namespace App\Scopes;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Scope;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class ScopeExpired implements Scope
{
    /**
     * Apply the scope to a given Eloquent query builder.
     *
     * @param  \Illuminate\Database\Eloquent\Builder $builder
     * @param  \Illuminate\Database\Eloquent\Model $model
     * @return void
     */
    public function apply(Builder $builder, Model $model)
    {
        // last date is smaller than today آخر يوم لو اكبر من انهرده يبقى لسه فيه وقت والعكس صحيح
        $builder->where('end_date', '<', Carbon::today());
    }
}