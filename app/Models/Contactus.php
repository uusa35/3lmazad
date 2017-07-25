<?php

namespace App\Models;
use App\Services\Traits\LocaleTrait;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Contactus
 *
 * @mixin \Eloquent
 */
class Contactus extends Model
{
    use LocaleTrait;
    public $localeStrings = [''];
    protected $table = 'contactus';
    protected $guarded = [''];
}
