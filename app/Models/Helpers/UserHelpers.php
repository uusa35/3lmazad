<?php
namespace App\Models\Helpers;
/**
 * Created by PhpStorm.
 * User: usamaahmed
 * Date: 4/25/17
 * Time: 7:14 PM
 */

trait UserHelpers
{
    public function scopeFeatured($q)
    {
        return $q->where('featured', true);
    }

    public function getIsAdminAttribute()
    {
        if (!$this->roles->isEmpty())
            return $this->roles->first()->name === 'admin';
        else
            false;
    }

    public function getIsUserAttribute()
    {
        if (!$this->roles->isEmpty())
            return $this->roles->first()->name === 'user';
        else
            false;
    }

    public function getIsMerchantAttribute()
    {
        if (!$this->roles->isEmpty())
            return $this->roles->first()->name === 'merchant';
        else
            return false;
    }

    public function scopeUsers($q)
    {
        return $q->whereHas('roles', function ($r) {
            $r->where('name', 'user');
        });

    }

    public function scopeMerchants($q)
    {
        return $q->whereHas('roles', function ($r) {
            $r->where('name', 'merchant');
        });
    }
}