<?php

namespace App\Models;

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

    public function items()
    {
        return $this->hasMany(Item::class);
    }

    /**
     * hasMany relation
     * Category has many branches(that are related to distributors only)
     * Branch belongsTo Category
     */
    public function branch()
    {
        return $this->hasMany(Branch::class);
    }

}
