<?php

namespace App\Models;

use App\Casts\Json;
use Illuminate\Support\Str;
use App\Scopes\GlobaleScope;
use Illuminate\Support\Facades\DB;
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


    protected static function booted()
    {
        static::creating(function ($model) {
            if (array_key_exists('link', $model->getAttributes()) || in_array('link', $model->getFillable())) {

                if (empty($model->link)) {

                    $name = $model->nameLang('en');


                    $slug = $name ? Str::slug($name) : Str::slug(Str::random(8));
                    $original = $slug;
                    $count = 1;

                    while (DB::table($model->getTable())->where('link', $slug)->exists()) {
                        $slug = $original . '-' . $count++;
                    }

                    $model->link = $slug;
                }
            }
        });
    }

    public static function listForSelect(
        $type = null,
        $key = 'id',
        $valueMethod = 'nameLang',
        $queryScope = 'active',
        $columns = ['id', 'name'],
    ) {
        $query = static::query();

        if (method_exists(static::class, 'scope' . ucfirst($queryScope))) {
            $query = (new static)->$queryScope($query);
        }

        $query->select($columns);

        $items = $query->get()->mapWithKeys(function ($item) use ($key, $valueMethod) {
            return [$item->$key => $item->$valueMethod()];
        })->toArray();

        if ($type === 'default') {
            $items = defaultOption() + $items;
        } elseif ($type === 'filter') {
            $items = filterOption() + $items;
        }

        return $items;
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
