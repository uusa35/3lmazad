<?php

namespace App\Models;


class Deal extends BaseModel
{
    public function ads()
    {
        return $this->belongsToMany(Ad::class);
    }

    public function plan() {
        return $this->belongsTo(Plan::class);
    }
}
