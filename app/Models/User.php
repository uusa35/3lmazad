<?php

namespace App\Models;

use App\Events\UserCreated;
use App\Models\Helpers\UserHelpers;
use App\Models\Traits\UserTrait;
use App\Scopes\ScopeActive;
use App\Scopes\ScopeUserMustHaveRole;
use App\Services\Traits\LocaleTrait;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Route;

class User extends Authenticatable
{
    use Notifiable, UserTrait, UserHelpers, ModelHelpers, LocaleTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
//    protected $fillable = [
//        'name', 'email', 'password', 'mobile',
//        'is_mobile_visible', 'is_email_visible', 'country_id', 'description', 'avatar', 'active', 'featured'
//    ];
    protected $guarded = [''];
    public $localeStrings = [''];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'active' => 'boolean',
        'featured' => 'boolean',
        'is_mobile_visible' => 'boolean',
        'is_email_visible' => 'boolean'
    ];

    protected $with = ['roles'];

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
                static::addGlobalScope(new ScopeActive());
                static::addGlobalScope(new ScopeUserMustHaveRole());
            }
        }
    }
}
