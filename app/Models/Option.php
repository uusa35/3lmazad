<?php
namespace App\Models;


use App\Services\Traits\LocaleTrait;
use Illuminate\Database\Eloquent\Model;

class Option extends Model
{
    use LocaleTrait;
    public $localeStrings = ['name'];

    public function field()
    {
        return $this->belongsTo(Field::class);
    }
}
