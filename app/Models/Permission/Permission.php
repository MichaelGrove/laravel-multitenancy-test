<?php

namespace App\Models\Permission;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    public function group () {
        return $this->hasOne('App\Models\Permission\PermissionGroup');
    }
}
