<?php

namespace App\Models;

use Spatie\Activitylog\LogOptions;
use App\Traits\HasDefaultLogOptions;
use Illuminate\Database\Eloquent\Model;

class Favorite extends Model
{
    use HasDefaultLogOptions;
    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
