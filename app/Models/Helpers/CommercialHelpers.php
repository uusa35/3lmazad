<?php
namespace App\Models\Helpers;
/**
 * Created by PhpStorm.
 * User: usamaahmed
 * Date: 4/25/17
 * Time: 7:37 PM
 */

trait CommercialHelpers
{
    public function scopeFixed()
    {
        return $this->where('is_fixed', true);
    }

    public function scopeNotFixed()
    {
        return $this->where('is_fixed', true);
    }
}