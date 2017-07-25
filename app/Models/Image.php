<?php

namespace App\Models;
use App\Services\Traits\LocaleTrait;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Image
 *
 * @property-read \App\Models\Gallery $gallery
 * @mixin \Eloquent
 */
class Image extends Model
{
    use LocaleTrait;
    public $localeStrings = ['description'];

    public function gallery()
    {
        return $this->belongsTo(Gallery::class,'gallery_id');
    }

}
