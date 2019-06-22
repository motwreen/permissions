<?php

namespace Motwreen\Permissions\Models;

use Illuminate\Database\Eloquent\Model;

class Resource extends Model
{
    public function permissions(){
        return $this->hasMany(ResourcePermission::class) ;
    }
}
