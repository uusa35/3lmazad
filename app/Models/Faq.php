<?php

namespace App\Models;

use App\Services\Traits\LocaleTrait;

class Faq extends BaseModel
{
    use LocaleTrait;
    public $localeStrings = ['title','body'];
    protected $guarded = [''];
}
