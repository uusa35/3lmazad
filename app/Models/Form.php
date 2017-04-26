<?php

namespace App\Models;


class Form extends BaseModel
{

    public function category()
    {
        return $this->hasOne(Category::class);
    }

    public function fields() {
        return $this->belongsToMany(Field::class);
    }
}
