<?php

namespace App\Models;


class Deal extends BaseModel
{
    public function ad()
    {
        return $this->belongsTo(Ad::class);
    }

    public function plan() {
        return $this->belongsTo(Plan::class);
    }
}
