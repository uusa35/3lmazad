<?php

namespace App\Models;


use App\Services\Traits\LocaleTrait;
use Illuminate\Database\Eloquent\Model;

class Term extends Model
{
    use LocaleTrait;
    public $localeStrings = ['title','body'];
    protected $guarded = [''];
}
