<?php

namespace App\Models;


use App\Scopes\ScopeExpired;

class Deal extends BaseModel
{


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
            if (in_array('api', request()->segments(), true)) {
                static::addGlobalScope(new ScopeExpired());
            }

            if (!in_array('backend', request()->segments(), true)) {
                static::addGlobalScope(new ScopeExpired());
            }
        }
    }

    public function plan()
    {
        return $this->belongsTo(Plan::class);
    }

    public function ads()
    {
        return $this->belongsToMany(Ad::class);
    }
}
