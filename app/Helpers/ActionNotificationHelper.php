<?php
namespace App\Helpers;

class ActionNotificationHelper
{
    public static function  getActions(){
        return [
            'filter'=>__('site.filter'),
            'delete'=>__('site.delete'),
        ];
    }

    public static function getTypes(){
        return [
            'all'=>__('site.all'),
            'database'=>__('site.database'),
            'firebase'=>__('site.firebase'),
        ];
    }
    public static function getDevices(){
        return [
            'all'=>__('site.all'),
            'android'=>__('site.android'),
            'apple'=>__('site.apple'),
        ];
    }

}
