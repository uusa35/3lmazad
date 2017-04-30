<?php
namespace App\Models;


class Plan extends BaseModel
{
    public function deals()
    {
        return $this->hasMany(Plan::class);
    }
}
