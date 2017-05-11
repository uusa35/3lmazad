<?php

namespace App\Models;
use App\Services\Traits\LocaleTrait;

/**
 * App\Models\Aboutus
 *
 * @mixin \Eloquent
 */
class Aboutus extends BaseModel
{
    use LocaleTrait;
    protected $table = 'aboutus';
    protected $localeStrings = ['title','body'];
    protected $guarded = [''];
}
