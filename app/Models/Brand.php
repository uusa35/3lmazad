<?php

namespace App\Models;

use App\Services\Traits\LocaleTrait;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use LocaleTrait;
    public $localeStrings = ['name'];
    protected $guarded = [''];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     * only parent categories
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function ads()
    {
        return $this->hasMany(Ad::class);
    }

    public function models()
    {
        return $this->hasMany(BrandModel::class);
    }
}
