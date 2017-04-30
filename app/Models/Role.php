<?php

namespace App\Models;

class Role extends BaseModel
{
    public function users()
    {
        return $this->belongsToMany(User::class,'user_role');
    }

}
