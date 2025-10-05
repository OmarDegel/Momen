<?php

namespace App\Models;

use App\Enums\ContactEnum;
use Illuminate\Database\Eloquent\Model;

class Contact extends MainModel
{
    protected $fillable = [
        'user_id',
        'phone',
        'name',
        'email',
        'title',
        'type',
        'content',
        'attachment',
        'is_read',
        'active',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function getTypeLabelAttribute(): string
    {
        return ContactEnum::from($this->type)->label();
    }
    public function scopeFilter($query, $request = null)
    {
        $request = $request ?? request();
        $filters = $request->only(['user_id', 'parent_id', 'service_id']);
        $query
            ->mainSearch($request->input('search'))
            ->mainApplyDynamicFilters($filters)
            ->sort($request)
            ->trash($request);
        return $query;
    }
}
