<?php

namespace App\Models;


class AdMeta extends BaseModel
{
    public $localeStrings = [''];
    protected $casts = [
        'furnished' => 'boolean'
    ];
    protected $guarded = [''];

    public function ad()
    {
        return $this->belongsTo(Ad::class,'ad_id');
    }
}
