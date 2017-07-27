<?php
namespace App\Models;


use App\Scopes\ScopeActive;
use App\Services\Traits\LocaleTrait;
use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    use LocaleTrait;
    public $localeStrings = ['name'];

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
            if (!in_array('backend', request()->segments(), true)) {
                static::addGlobalScope(new ScopeActive());
            }
        }
    }

    public function deals()
    {
        return $this->hasMany(Plan::class);
    }
}
