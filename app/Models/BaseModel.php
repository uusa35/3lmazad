<?php
/**
 * Created by PhpStorm.
 * User: usamaahmed
 * Date: 4/23/17
 * Time: 4:33 PM
 */

namespace App\Models;


use App\Services\Traits\LocaleTrait;
use Illuminate\Database\Eloquent\Model;

class BaseModel extends Model
{
    use LocaleTrait, ModelHelpers;
    protected $localeStrings = [];
    protected $guarded = [''];
}