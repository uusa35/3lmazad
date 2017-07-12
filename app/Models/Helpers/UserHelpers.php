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

    public function getIsAdminAttribute()
    {
        return $this->roles->first()->name === 'admin';
    }

    public function getIsUserAttribute()
    {
        return $this->roles->first()->name === 'user';
    }

    public function getIsMerchantAttribute()
    {
        return $this->roles->first()->name === 'merchant';
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