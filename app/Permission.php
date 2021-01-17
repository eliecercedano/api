<?php

namespace App;

use Laratrust\Models\LaratrustPermission;

class Permission extends LaratrustPermission
{
    public $guarded = [];

    public function roles() {
	   return $this->belongsToMany(Role::class,'roles_permissions');
	}

	public function users() {
	   return $this->belongsToMany(User::class,'users_permissions');
	}
}
