<?php

namespace App\Models;


use App\Services\Traits\LocaleTrait;
use Illuminate\Database\Eloquent\Model;

class BrandModel extends Model
{
    use LocaleTrait;
    public $localeStrings = ['name'];
    protected $table = 'models';
    protected $guarded = [''];

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function ads() {
        return $this->hasMany(Ad::class);
    }
}
