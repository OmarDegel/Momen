<?php

namespace App\Models;

use Spatie\Activitylog\LogOptions;
use App\Traits\HasDefaultLogOptions;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasDefaultLogOptions;
    protected $fillable = [
        'group',
        'key',
        'value',
    ];
    
}
