<?php

namespace App\Models;


use App\Scopes\ScopeExpired;
use App\Scopes\ScopeValid;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Deal extends Model
{
    use ModelHelpers;
    public $localeStrings = [''];
    protected $guarded = [''];
    protected $dates = ['created_at', 'updated_at', 'start_date', 'end_date'];

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
            if (!in_array('backend',request()->segments(), true)) {
                static::addGlobalScope(new ScopeExpired());
                static::addGlobalScope(new ScopeValid());
            }
        }
    }

    public function plan()
    {
        return $this->belongsTo(Plan::class);
    }

    public function ad()
    {
        return $this->belongsTo(Ad::class);
    }

    public function getPlanIsPaidAttribute()
    {
        return $this->plan->is_free;
    }

    public function getIsValidAttribute()
    {
        return ($this->end_date > Carbon::now() && $this->valid) ? true : false;
    }
}
