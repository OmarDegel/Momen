<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    public function parent()
    {
        return $this->belongsTo(Setting::class, 'parent_id');
    }

    public function children()
    {
        return $this->hasMany(Setting::class, 'parent_id');
    }
}
