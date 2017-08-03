<?php

namespace App\Models;


use App\Scopes\ScopeItemMustHaveUserWithRole;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use ModelHelpers;
    public $localeStrings = [''];
    protected $guarded = [''];

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
                static::addGlobalScope(new ScopeItemMustHaveUserWithRole());
            }
        }
    }

    public function commentable()
    {
        return $this->morphTo();
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
