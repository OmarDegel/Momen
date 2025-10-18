<?php

namespace App\Models;

use Spatie\Activitylog\LogOptions;
use App\Traits\HasDefaultLogOptions;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasDefaultLogOptions;
    public function parent()
    {
        return $this->belongsTo(Setting::class, 'parent_id');
    }

    public function children()
    {
        return $this->hasMany(Setting::class, 'parent_id');
    }
}
