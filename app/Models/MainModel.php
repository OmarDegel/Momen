<?php

namespace App\Models;

use App\Casts\Json;
use App\Scopes\GlobaleScope;
use Spatie\Activitylog\LogOptions;
use App\Traits\HasDefaultLogOptions;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Illuminate\Database\Eloquent\SoftDeletes;

class MainModel extends Model
{
    use LogsActivity, SoftDeletes, GlobaleScope, HasDefaultLogOptions;

    protected static $logAttributes = ['*'];

    protected function casts(): array
    {
        return [
            'name' => Json::class,
            'content' => Json::class,
            'title' => Json::class,
        ];
    }




    public function nameLang($locale = null)
    {
        $data = $this->name;
        if ($locale == null) {
            $user = auth()->guard("api")->user();
            $userLang = $user ? $user->locale : app()->getLocale();
            return $data[$userLang];
        }
        return $data[$locale] ?? null;
    }

    public function contentLang($locale = null)
    {
        $data = $this->content;
        if ($locale == null) {
            $user = auth()->guard("api")->user();
            $userLang = $user ? $user->locale : app()->getLocale();
            return $data[$userLang];
        }
        return $data[$locale] ?? null;
    }
    public function titleLang($locale = null)
    {
        $data = $this->title;
        if ($locale == null) {
            $user = auth()->guard("api")->user();
            $userLang = $user ? $user->locale : app()->getLocale();
            return $data[$userLang];
        }
        return $data[$locale] ?? null;
    }
}
