<?php

namespace App\Models;


class AdMeta extends BaseModel
{
    public function ad()
    {
        return $this->belongsTo(Ad::class,'ad_id');
    }
}
