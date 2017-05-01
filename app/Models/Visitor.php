<?php

namespace App\Models;


class Visitor extends BaseModel
{
    protected $table = 'ad_visitors';
    protected $guarded = [''];

    public function ad()
    {
        return $this->belongsTo(Ad::class);
    }
}
