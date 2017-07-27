<?php

namespace App\Models;


use App\Models\Helpers\CommercialHelpers;
use App\Scopes\ScopeActive;
use App\Scopes\ScopeExpired;
use App\Services\Traits\LocaleTrait;
use Illuminate\Database\Eloquent\Model;

class Commercial extends Model
{
    use CommercialHelpers, LocaleTrait;
    public $localeStrings = ['title', 'description'];
    protected $dates = ['start_date', 'end_date', 'created_at', 'deleted_at'];
    protected $casts = ['active'];
    protected $hidden = ['created_at','updated_at'];

    /**
     * The "booting" method of the model.
     * applying the scope only in the backend routes.
     *
     * @return void
     */
    protected static function boot()
    {
        parent::boot();

        if (!app()->environment('seeding')) {
//            if (in_array('api', request()->segments(), true)) {
                static::addGlobalScope(new ScopeActive());
//            }

//            if (!in_array('backend', request()->segments(), true)) {
                static::addGlobalScope(new ScopeActive());
                static::addGlobalScope(new ScopeExpired());
//            }
        }
    }
}
