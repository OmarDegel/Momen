<?php

namespace App\Models;

use Laratrust\Models\Role as RoleModel;
use Spatie\Activitylog\Traits\LogsActivity;

class Role extends RoleModel
{
    use LogsActivity;
    protected static $logAttributes = ['*'];


    public function getActivitylogOptions(): \Spatie\Activitylog\LogOptions
    {
        return \Spatie\Activitylog\LogOptions::defaults()
            ->logAll()
            ->dontLogIfAttributesChangedOnly(['updated_at'])
            ->useLogName('system');
    }

    public $guarded = [];
}
