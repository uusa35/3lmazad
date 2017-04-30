<?php

namespace App\Models;


class Form extends BaseModel
{

    public function categories()
    {
        return $this->hasMany(Category::class);
    }

    public function fields() {
        return $this->belongsToMany(Field::class);
    }
}
