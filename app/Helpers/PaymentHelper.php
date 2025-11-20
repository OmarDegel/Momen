<?php 
namespace App\Helpers;


class PaymentHelper
{
    public static function getPaymentTypes()
    {
        return [
            "cash" => __("site.cash"),
            "vodafone" => __("site.vodafone"),
            "we" => __("site.we"),
            "orange" => __("site.orange"),
            "etisalat" => __("site.etisalat"),
            "fawry" => __("site.fawry"),
            "bank" => __("site.bank"),
            "visa" => __("site.visa"),
        ];
    }
}