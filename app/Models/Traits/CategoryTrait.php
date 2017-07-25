<?php
namespace App\Models\Traits;

use App\CategoryForm;
use App\Models\Ad;
use App\Models\Brand;
use App\Models\Field;
use App\Models\Form;
use App\Models\Type;
use App\Models\User;

/**
 * Created by PhpStorm.
 * User: usamaahmed
 * Date: 1/30/17
 * Time: 4:07 PM
 */
trait CategoryTrait
{

    /**
     * @return mixed
     * when user is company it must have category
     */
    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function ads()
    {
        return $this->hasMany(Ad::class);
    }

    public function fields()
    {
        return $this->belongsToMany(Field::class);
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

}