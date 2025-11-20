<?php

namespace App\Models;

use Spatie\Activitylog\LogOptions;
use App\Traits\HasDefaultLogOptions;
use Laratrust\Models\Role as RoleModel;
use Spatie\Activitylog\Traits\LogsActivity;

class Role extends RoleModel
{
    use LogsActivity, HasDefaultLogOptions;
    protected static $logAttributes = ['*'];
    

   

    public $guarded = [];
}
