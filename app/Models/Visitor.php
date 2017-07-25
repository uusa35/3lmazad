<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Visitor extends Model
{
    protected $table = 'ad_visitors';
    public $localeStrings = [''];
    protected $guarded = [''];

    public function ad()
    {
        return $this->belongsTo(Ad::class);
    }
}
