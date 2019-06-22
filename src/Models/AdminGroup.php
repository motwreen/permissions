<?php

namespace Motwreen\Permissions\Models;

use Illuminate\Database\Eloquent\Model;

class AdminGroup extends Model
{

    public function permissions()
    {
        return $this->belongsToMany(ResourcePermission::class, 'group_permissions', 'group_id', 'permission_id');
    }

}
