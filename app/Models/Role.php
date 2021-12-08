<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    public function permissions()
    {
        return $this->belongsToMany(
            Role::class,
            'role_permissions', 
            'permission_id',
            'role_id'
        );
    }
}