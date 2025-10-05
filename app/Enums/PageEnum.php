<?php

namespace App\Enums;

enum PageEnum
{
    public static function getPagesTypes()
    {
        return [
            "home" => __("site.home"),
            "about" => __("site.about"),
            "contact" => __("site.contact"),
            "terms" => __("site.terms"),
            "privacy" => __("site.privacy"),
            "faq" => __("site.faq"),
            "profile" => __("site.profile"),
            "support" => __("site.support"),
        ];
    }
}
