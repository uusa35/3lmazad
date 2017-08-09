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

class ScopeAdHasValidDeal implements Scope
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
        // once ad is created a free deal will be attached to such ad.
        $builder->whereHas('deals', function ($q) {
            $q->where('end_date', '>', Carbon::now());
        });
    }
}