<?php
namespace App\Models;


class Plan extends BaseModel
{

    public function ad()
    {
        return $this->hasMany(Ad::class);
    }

    public function deals()
    {
        return $this->hasMany(Plan::class);
    }
}
