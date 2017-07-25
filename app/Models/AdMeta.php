<?php

namespace App\Models;


use App\Services\Traits\LocaleTrait;
use Illuminate\Database\Eloquent\Model;

class AdMeta extends Model
{
    use LocaleTrait, ModelHelpers;
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
