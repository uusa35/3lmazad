<?php

namespace App\Models;

use App\Services\Traits\LocaleTrait;

class Term extends BaseModel
{
    use LocaleTrait;
    protected $localeStrings = ['title','body'];
    protected $guarded = [''];
}
