<?php

namespace App\Models;


use App\Services\Traits\LocaleTrait;
use Illuminate\Database\Eloquent\Model;

class Auction extends Model
{
    use LocaleTrait;
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
