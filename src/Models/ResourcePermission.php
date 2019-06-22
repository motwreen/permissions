<?php

namespace Motwreen\Permissions\Models;

use Illuminate\Database\Eloquent\Model;

class ResourcePermission extends Model
{
    protected $appends = ['short_action'];

    public function getShortActionAttribute()
    {
        $pieces = explode('\\',$this->action);
        return end($pieces);
    }

    public function resource()
    {
        return $this->belongsTo(Resource::class);
    }
}
