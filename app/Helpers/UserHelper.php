<?php

namespace App\Helpers;


class UserHelper
{
    public static function userType()
    {
        return [
            'admin' => __('site.Admin'),
            'client' => __('site.Client'),
            'delivery' => __('site.delivery'),
        ];
    }
}
