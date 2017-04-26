<?php
namespace App\Models\Traits;

use App\CategoryForm;
use App\Models\Ad;
use App\Models\Brand;
use App\Models\Form;
use App\Models\Type;

/**
 * Created by PhpStorm.
 * User: usamaahmed
 * Date: 1/30/17
 * Time: 4:07 PM
 */
trait CategoryTrait
{
    public function ads()
    {
        return $this->hasMany(Ad::class);
    }

    public function form()
    {
        return $this->belongsTo(Form::class);
    }

    /**
     * @return mixed
     * brands like : apple / samsung
     */
    public function brands()
    {
        return $this->hasMany(Brand::class);
    }

    /**
     * @return mixed
     * types like : desktop / laptops
     */
    public function types()
    {
        return $this->hasMany(Type::class);
    }

    public function scopeParents($q)
    {
        return $q->where('parent_id', 0);
    }

    public function scopeSubCategories($q)
    {
        return $q->where('parent_id', '!=', 0);
    }

    public function scopeFeatured($q)
    {
        return $q->where('featured', true);
    }

}