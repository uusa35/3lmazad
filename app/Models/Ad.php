<?php

namespace App\Models;

use App\Models\Helpers\AdHelpers;
use App\Models\Traits\AdTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Ad extends Model
{
    use AdTrait, AdHelpers, SoftDeletes;
    protected $guarded = [''];
    protected $casts = [
        'active' => 'boolean',
        'featured' => 'boolean'
    ];

}
