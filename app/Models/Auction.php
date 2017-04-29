<?php

namespace App\Models;


class Auction extends BaseModel
{
    public function ads()
    {
        return $this->belongsTo(Ad::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
