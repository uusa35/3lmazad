<?php

namespace App\Models;

class Brand extends BaseModel
{

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
