<?php

namespace App\Models;

use App\Services\Traits\LocaleTrait;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use LocaleTrait, ModelHelpers;
    public $localeStrings = ['name'];
    protected $guarded = [''];

    public function menu()
    {
        return $this->belongsTo(Menu::class);
    }
}
