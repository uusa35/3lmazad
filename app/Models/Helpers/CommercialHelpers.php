<?php
namespace App\Models\Helpers;
/**
 * Created by PhpStorm.
 * User: usamaahmed
 * Date: 4/25/17
 * Time: 7:37 PM
 */

trait CommericalHelpers
{
    public function scopeIsFixed()
    {
        return $this->where('is_fixed', true);
    }

    public function scopeIsNotFixed()
    {
        return $this->where('is_fixed', true);
    }
}