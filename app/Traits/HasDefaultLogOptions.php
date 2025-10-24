<?php

namespace App\Traits;

use Spatie\Activitylog\LogOptions;

trait HasDefaultLogOptions
{
    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logAll()
            ->logOnlyDirty()
            ->dontLogIfAttributesChangedOnly(['updated_at'])
            ->useLogName('system');
    }
}
