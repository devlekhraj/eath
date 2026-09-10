<?php

namespace Admin\Models;

use Illuminate\Database\Eloquent\Model;
use Admin\Models\Permission;

class Role extends Model
{
    public function permissions()
    {
        return $this->belongsToMany(Permission::class, 'permission_role');
    }

    public function admins()
    {
        return $this->belongsToMany(Admin::class, 'admin_role');
    }
    public function users()
    {
        return $this->belongsToMany(User::class, 'user_role');
    }
}
