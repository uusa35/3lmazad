<?php

namespace App\Models;


use App\Services\Traits\LocaleTrait;

class Term extends BaseModel
{
    use LocaleTrait;
    public $localeStrings = ['title','body'];
    protected $guarded = [''];
}
