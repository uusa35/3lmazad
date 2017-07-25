<?php
namespace App\Models;
use App\Services\Traits\LocaleTrait;
use Illuminate\Database\Eloquent\Model;


/**
 * App\Models\Country
 *
 * @mixin \Eloquent
 */
class Country extends Model
{
    use LocaleTrait;
    public $localeStrings = ['name'];
    protected $guarded = [''];

    public function user()
    {
        return $this->hasMany(User::class);
    }

    public function ads()
    {
        return $this->hasManyThrough(Ad::class, User::class);
    }

    public function areas()
    {
        return $this->hasMany(Area::class);
    }

}

?>