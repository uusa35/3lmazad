<?php

namespace App\Models;

use App\Scopes\ScopeActive;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

/**
 * App\Models\Newsletter
 *
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @mixin \Eloquent
 */
class Newsletter extends Model
{
    use Notifiable;
    public $localeStrings = [''];
    protected $table = 'newsletter';
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
                static::addGlobalScope(new ScopeActive());
            }
        }
    }

}
