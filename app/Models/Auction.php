<?php

namespace App\Models;


use App\Scopes\ScopeItemMustHaveUserWithRole;
use App\Services\Traits\LocaleTrait;
use Illuminate\Database\Eloquent\Model;

class Auction extends Model
{
    use LocaleTrait, ModelHelpers;
    public $localeStrings = [''];

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
            static::addGlobalScope(new ScopeItemMustHaveUserWithRole());
        }
    }

    public function ads()
    {
        return $this->belongsTo(Ad::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
