<?php

namespace App\Models;

use Spatie\Activitylog\LogOptions;
use App\Traits\HasDefaultLogOptions;
use Spatie\Activitylog\Models\Activity as SpatieActivity;

class ActivityLog extends SpatieActivity
{
    use HasDefaultLogOptions;
    
    protected $table = 'activity_log';
    protected $casts = [
        'properties' => 'array'
    ];
}
