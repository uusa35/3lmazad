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
    public $localeStrings = ['title','body'];
    protected $table = 'aboutus';
    protected $guarded = [''];
}
