<?php
namespace App\Models;


class Option extends BaseModel
{
    public function field()
    {
        return $this->belongsTo(Field::class);
    }
}
