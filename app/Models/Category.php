<?php

namespace App\Models;

use App\Models\Traits\CategoryTrait;

/**
 * App\Models\Category
 *
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Category[] $children
 * @property-read \App\Models\Category $parent
 * @mixin \Eloquent
 */
class Category extends BaseModel
{
    use CategoryTrait;

    protected $guarded = [''];

    public function parent()
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }

    public function children()
    {
        return $this->hasMany(Category::class, 'parent_id');
    }

    public function category()
    {
        return $this->hasOne(Brand::class);
    }

}
