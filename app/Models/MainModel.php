<?php

namespace App\Models;

use App\Casts\Json;
use App\Scopes\GlobaleScope;
use Spatie\Activitylog\LogOptions;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Illuminate\Database\Eloquent\SoftDeletes;

class MainModel extends Model
{
    use LogsActivity, SoftDeletes , GlobaleScope;

    protected static $logAttributes = ['*'];

    protected function casts(): array
    {
        return [
            'name' => Json::class,
            'content' => Json::class,
            'title' => Json::class,
        ];
    }
    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logAll()
            ->logOnlyDirty()
            ->dontLogIfAttributesChangedOnly(['updated_at'])
            ->useLogName('system');
    }



    public function nameLang($locale = null)
    {
        $data = (array) $this->name;
        if ($locale == null) {
            $user = auth()->guard("api")->user();
            $userLang = $user ? $user->locale : app()->getLocale();
            return $data[$userLang] ?? null;
        }
        return $data[$locale] ?? null;
    }

    public function contentLang($locale = null)
    {
        $data = (array) $this->content;
        if ($locale == null) {
            $user = auth()->guard("api")->user();
            $userLang = $user ? $user->locale : app()->getLocale();
            return $data[$userLang] ?? null;
        }
        return $data[$locale] ?? null;
    }
    public function titleLang($locale = null)
    {
        $data = (array) $this->title;
        if ($locale == null) {
            $user = auth()->guard("api")->user();
            $userLang = $user ? $user->locale : app()->getLocale();
            return $data[$userLang] ?? null;
        }
        return $data[$locale] ?? null;
    }



}
