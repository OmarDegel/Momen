
<?php

use App\Models\Setting;

if (!function_exists('statusType')) {
    function statusType()
    {
        return [
            1 => __('site.active'),
            0 => __('site.not_active'),
        ];
    }
}
if (!function_exists('filterBoolien')) {
    function filterBoolien()
    {
        return ['all' => __('site.all'), '1' => __('site.yes'), '0' => __('site.no')];
    }
}

if (!function_exists('currencyFormat')) {
    function currencyFormat($amount, $decimals = 2)
    {
        return number_format($amount, $decimals) . ' ' . config('app.currency', 'EGP');
    }
}

if (!function_exists('formatDate')) {
    function formatDate($date, $format = 'Y-m-d H:i')
    {
        return $date ? \Carbon\Carbon::parse($date)->format($format) : null;
    }
}

if (!function_exists('booleanType')) {
    function booleanType()
    {
        return [
            1 => __('site.yes'),
            0 => __('site.no'),
        ];
    }
}

if (!function_exists('getLangs')) {
    function getLangs()
    {
        return [
            'ar' => __('site.arabic'),
            'en' => __('site.english'),
        ];
    }
}

if (!function_exists('getThemes')) {
    function getThemes()
    {
        return [
            'light' => [
                'theme'      => 'light',
                'icon_class' => 'ti ti-sun me-2',
                'value'      => __('site.light'),
            ],
            'dark' => [
                'theme'      => 'dark',
                'icon_class' => 'ti ti-moon me-2',
                'value'      => __('site.dark'),
            ],
        ];
    }
}

if (! function_exists('getTableName')) {
    function getTableName($modelType)
    {
        $className = class_basename($modelType);


        return __(
            'site.' . \Illuminate\Support\Str::plural(strtolower($className))
        );
    }
}
if (! function_exists('setting')) {
    function setting($key, $default = null)
    {
        return Setting::where('key', $key)->value('value') ?? $default;
    }
}
if (! function_exists('deliveryTimeType')) {
    function deliveryTimeType()
    {
        return [
            'morning' => __('site.morning'),
            'evening' => __('site.evening'),
            "afternoon" => __('site.afternoon'),
            "night" => __('site.night'),
        ];
    }
}
if (! function_exists('defaultOption')) {
    function defaultOption($label = null)
    {
        return [null => $label ?? __('site.select_option')];
    }
}
if (! function_exists('filterOption')) {
    function filterOption($label = null)
    {
        return ['all' => $label ?? __('site.all')];
    }
}
