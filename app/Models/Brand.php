<?php

namespace App\Models;

class Brand extends BaseModel
{

    public function models()
    {
        return $this->hasMany(Model::class);
    }

    public function ads()
    {
        return $this->hasManyThrough(Ad::class, Model::class);
    }
}
