<?php

namespace App\Models;


use App\Services\Traits\LocaleTrait;

class Auction extends BaseModel
{
    public $localeStrings = [''];
    public function ads()
    {
        return $this->belongsTo(Ad::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
