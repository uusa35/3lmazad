<?php
namespace App\Models;
use App\Services\Traits\LocaleTrait;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Aboutus
 *
 * @mixin \Eloquent
 */
class Aboutus extends Model
{
    use LocaleTrait;
    public $localeStrings = ['title','body'];
    protected $table = 'aboutus';
    protected $guarded = [''];
}
