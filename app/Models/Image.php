<?php

namespace App\Models;

/**
 * App\Models\Image
 *
 * @property-read \App\Models\Gallery $gallery
 * @mixin \Eloquent
 */
class Image extends BaseModel
{
    protected $localeStrings = ['description'];

    public function gallery()
    {
        return $this->belongsTo(Gallery::class,'gallery_id');
    }

}
