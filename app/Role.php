<?php

namespace App;

use Laratrust\Models\LaratrustRole;

class Role extends LaratrustRole
{
    public $guarded = [];

    public function permissions() {
	   return $this->belongsToMany(Permission::class,'permission_role');
	}

	public function users() {
	   return $this->belongsToMany(User::class,'role_user');
	}
}
