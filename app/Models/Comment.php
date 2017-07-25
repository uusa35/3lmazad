<?php

namespace App\Models;



class Comment extends BaseModel
{
    public $localeStrings = [''];
    public function commentable()
    {
        return $this->morphTo();
    }

    public function user() {
        return $this->belongsTo(User::class);
    }
}
