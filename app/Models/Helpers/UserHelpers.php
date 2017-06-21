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
        return $this->roles()->first()->name === 'admin';
    }

}