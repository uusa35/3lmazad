<?php
namespace App\Models\Traits;

use App\Deal;
use App\Models\Area;
use App\Models\Color;
use App\Models\Size;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Country;
use App\Models\Gallery;
use App\Models\Model;
use App\Models\Plan;

/**
 * Created by PhpStorm.
 * User: usamaahmed
 * Date: 4/25/17
 * Time: 7:37 PM
 */
trait AdTrait
{

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function model()
    {
        return $this->belongsTo(Model::class);
    }

    public function area()
    {
        return $this->belongsTo(Area::class);
    }

    public function plan()
    {
        return $this->belongsTo(Plan::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function gallery()
    {
        return $this->morphMany(Gallery::class, 'galleryable');
    }

    public function color() {
        return $this->belongsTo(Color::class);
    }

    public function size() {
        return $this->belongsTo(Size::class);
    }

    public function deal() {
        return $this->hasOne(Deal::class);
    }


}