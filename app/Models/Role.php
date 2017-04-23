<?php

namespace App\Models;

class Role extends BaseModel
{
    protected $casts = [
        'is_company' => 'boolean',
    ];

    public function users()
    {
        return $this->belongsToMany(User::class, 'user_role');
    }

    public function scopeType($q, $type)
    {
        return $q->where('name', $type);
    }

    public function scopeCompanies($q)
    {
        return $q->where('is_company', true);
    }

}
