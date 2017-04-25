<?php

namespace App\Models;

use App\Models\Helpers\AdHelpers;
use App\Models\Traits\AdTrait;
use Illuminate\Database\Eloquent\Model;

class Ad extends Model
{
    use AdTrait, AdHelpers;
    protected $guarded = [''];
    protected $casts = [
        'active' => 'boolean',
        'featured' => 'boolean'
    ];

}
