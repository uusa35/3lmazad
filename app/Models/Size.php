<?php

namespace App\Models;

class Size extends BaseModel
{
    protected $localeStrings = ['name'];

    public function ad()
    {
        return $this->hasMany(Ad::class);
    }

    public function scopeSizesList($query)
    {
        return $query->pluck('name')->unique();
    }

    /**
     * Desription : size belongs to many product_attributes
     * Usage : backend.order.ordermeta.index
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function product_attributes()
    {
        return $this->hasOne(ProductAttribute::class, 'size_id');
    }
}
