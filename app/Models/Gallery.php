<?php

namespace App\Models;

use App\Scopes\ScopeActive;
use App\Scopes\ScopeGalleryHasImages;

/**
 * App\Models\Gallery
 *
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Image[] $images
 * @mixin \Eloquent
 */
class Gallery extends BaseModel
{
    protected $with = ['images'];
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
            if (!in_array('backend', request()->segments(), true)) {
                static::addGlobalScope(new ScopeActive());
            }
        }
    }

    public function galleryable()
    {
        return $this->morphTo();
    }

    public function images()
    {
        return $this->hasMany(Image::class);
    }

}
