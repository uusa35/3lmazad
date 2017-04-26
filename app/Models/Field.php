<?php

namespace App\Models;


class Field extends BaseModel
{

    public function forms()
    {
        return $this->belongsToMany(Form::class);
    }

}
