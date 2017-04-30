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
    protected $table = 'newsletter';
    protected $guarded = [''];


}
