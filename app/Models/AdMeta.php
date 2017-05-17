<?php

namespace App\Models;


class AdMeta extends BaseModel
{
    protected $casts = [
        'furnished' => 'boolean'
    ];

    public function ad()
    {
        return $this->belongsTo(Ad::class,'ad_id');
    }
}
