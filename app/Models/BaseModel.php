<?php
/**
 * Created by PhpStorm.
 * User: usamaahmed
 * Date: 4/23/17
 * Time: 4:33 PM
 */

namespace App\Models;


use App\Services\Traits\LocaleTrait;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Jenssegers\Date\Date;

class BaseModel extends Model
{
    use ModelHelpers;
    protected $guarded = [''];

    public function __get($key)
    {
        return parent::__get($key);
    }


}